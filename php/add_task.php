<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "taskmanagerapp";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$task_status = $_POST['task_status'];

$sql = "INSERT INTO tasks (task_name, task_description, task_status) VALUES ('$task_name', '$task_description', '$task_status')";

if ($con->query($sql) === TRUE) {
    echo "New task created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
?>
