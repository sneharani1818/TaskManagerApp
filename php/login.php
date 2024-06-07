<?php
echo "Redirected";
// Error handling 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "";
$database = "taskmanagerapp";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement to check if the email exists
    $sql = "SELECT `password` FROM `users` WHERE `email` = ?";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $stmt->store_result();

        // Check if the email exists
        if ($stmt->num_rows > 0) {
            // Bind the result to a variable
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                echo '<script>
                    alert("Login successful!");
                    window.location.href = "./dashboard.html";
                </script>';
            } else {
                echo '<script>
                    alert("Invalid email or password.");
                    window.location.href = "./login.html";
                </script>';
            }
        } else {
            echo '<script>
                alert("No account found with this email. Please register.");
                window.location.href = "./register.html";
            </script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $con->error;
    }
} else {
    echo "Invalid request method";
}

// Close the connection
mysqli_close($con);

?>
