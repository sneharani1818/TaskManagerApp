<?php
    //error handling 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $server="localhost";
    $username="root";
    $password="";
    $database="taskmanagerapp";

    $con= mysqli_connect($server, $username, $password,$database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        // echo "Not connected to DB";
    }

    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $full_name=$_POST['full_name'];
    // if (isset($_POST['phno'])) {
    //     $phno = $_POST['phno'];
    // } else {
    //     $phno = ''; // or handle it as needed
    // }
    $phno = isset($_POST['phno']) ? $_POST['phno'] : '';
    $dob=$_POST['dob'];
    $ques_type=$_POST['ques_type'];
    if($ques_type=="What was the name of your first pet?")
        $ques_type="pet";
    else if($ques_type=="What is your mother's fav food name?")
        $ques_type="food";
    else 
        $ques_type="school";

    $ans_of_ques=$_POST['ans_of_ques'];

    // $sql = "INSERT INTO `users` (`email`, `password`, `full_name`, `phno`, `dob`, `ques_type`, `ans_of_ques`, `curr_time`) VALUES ('$email', '$hashed_password', '$full_name', '$phno', '$dob', '$ques_type', '$ans_of_ques', current_timestamp());";
    $sql=$sql = "INSERT INTO `users` (`email`, `password`, `full_name`, `phno`, `dob`, `ques_type`, `ans_of_ques`, `curr_time`) VALUES (?, ?, ?, ?, ?, ?, ?, current_timestamp())";

    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssss", $email, $hashed_password, $full_name, $phno, $dob, $ques_type, $ans_of_ques);
    
        // Execute the statement
        if ($stmt->execute()) {
            // echo "Record inserted";
            echo '<script>
                alert("You have registered successfully and can log in using your email");
                window.location.href = "./login.html";
            </script>';
            // header('Location: ./index.html');
        } else {
            echo "Not inserted: Error =" . $stmt->error;
        }
    }
    
        // Close the statement
        $stmt->close();


    // //executing query
    // if($con->query($sql)){
    //     // echo "Record inserted";
    //     echo '<script>
    //         alert("You have registered successfully and can log in using your email");
    //         window.location.href = "./login.html";
    //     </script>';
    //     // header('Location: ./index.html');
    // }
    // else{
    //     echo "Not inserted: Error =".$con->error;
    // }

    mysqli_close($con);

?>

<!-- if ($stmt) {
    // Bind parameters
    $stmt->bind_param("sssssss", $email, $hashed_password, $full_name, $phno, $dob, $ques_type, $ans_of_ques);

    // Execute the statement
    if ($stmt->execute()) {
        // echo "Record inserted";
        echo '<script>
            alert("You have registered successfully and can log in using your email");
            window.location.href = "./login.html";
        </script>';
        // header('Location: ./index.html');
    } else {
        echo "Not inserted: Error =" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $con->error;
} -->
