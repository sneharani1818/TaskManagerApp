<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "taskmanagerapp";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['task_id'];
$task_name = $_POST['task_name'];
$task_description = $_POST['task_description'];
$task_status = $_POST['task_status'];

$sql = "UPDATE tasks SET task_name = '$task_name', task_description = '$task_description', task_status = '$task_status' WHERE id = $id";

if ($con->query($sql) === TRUE) {
    echo "Task updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

mysqli_close($con);
?>
