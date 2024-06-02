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
    if (isset($_POST['phno'])) {
        $phno = $_POST['phno'];
    } else {
        $phno = ''; // or handle it as needed
    }
    $dob=$_POST['dob'];
    $ques_type=$_POST['ques_type'];
    if($ques_type=="What was the name of your first pet?")
        $ques_type="pet";
    else if($ques_type=="What is your mother's fav food name?")
        $ques_type="food";
    else 
        $ques_type="school";

    $ans_of_ques=$_POST['ans_of_ques'];

    echo $email."<br>";
    echo $password."<br>";
    echo $full_name."<br>";
    echo $phno."<br>";
    echo $dob."<br>";
    echo $ques_type."<br>";
    echo $ans_of_ques;

    // $sql="INSERT INTO `users` (`email`, `password`, `full_name`, `phno`, `dob`, `ques_type`, `ans_of_ques`, `curr_time`) VALUES (`$email`, `$password`, `$full_name`, `$phno`, `$dob`, `$ques_type`, `$ans_of_ques`,current_timestamp());";
    $sql = "INSERT INTO `users` (`email`, `password`, `full_name`, `phno`, `dob`, `ques_type`, `ans_of_ques`, `curr_time`) VALUES ('$email', '$password', '$full_name', '$phno', '$dob', '$ques_type', '$ans_of_ques', current_timestamp());";
    
    //executing query
    if($con->query($sql)){
        echo "Record inserted";
    }
    else{
        echo "Not inserted: Error =".$con->error;
    }

    mysqli_close($con);

?>

