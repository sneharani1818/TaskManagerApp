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
        echo "Not connected to DB";
    }

    $email=$_POST['email'];
    $password=$_POST['password'];
    $full_name=$_POST['full_name'];
    if (isset($_POST['profile_img'])) {
        $profile_img = $_POST['profile_img'];
    } else {
        $profile_img = null; // or handle it as needed
    }
    if (isset($_POST['phno'])) {
        $phno = $_POST['phno'];
    } else {
        $phno = ''; // or handle it as needed
    }
    $dob=$_POST['dob'];
    $address=$_POST['address'];
    $ques_type=$_POST['ques_type'];
    $ans_of_ques=$_POST['ans_of_ques'];
    // $curr_time=$_POST[curr_time];
    
    echo $email."<br>";
    echo $password."<br>";
    echo $full_name."<br>";
    echo $profile_img."<br>";
    echo "<img src=".$profile_img.">";
    echo $phno."<br>";
    echo $dob."<br>";
    echo $address."<br>";
    echo $ques_type."<br>";
    echo $ans_of_ques;

    // $sql="INSERT INTO `users` (`email`, `password`, `full_name`, `profile_img`, `phno`, `dob`, `address`, `ques_type`, `ans_of_ques`, `curr_time`) VALUES ('abc@gmail.com', 'password', 'John Delta', NULL, '9999888877', '22-04-2002', 'London', 'pet', 'Cow',current_timestamp());";
    
    mysqli_close($con);

?>

