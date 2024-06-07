<?php
    echo "In testinh php file";
    //error handling 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    // Database connection
    require_once './config.php'; // Include database connection details

    // $server="localhost";
    // $username="root";
    // $password="";
    // $database="taskmanagerapp";

    // $con= mysqli_connect($server, $username, $password,$database);
    // if (!$con) {
    //     die("Connection failed: " . mysqli_connect_error());
    //     // echo "Not connected to DB";
    // }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate email and password (you can add more validation here)
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Hash the password securely using PHP's password_hash function
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
        echo "<br>".$email;
        echo "<br>";
        echo $password;
        echo "<br>";
        

    }



?>