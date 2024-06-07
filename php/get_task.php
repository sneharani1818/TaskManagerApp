<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "taskmanagerapp";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT * FROM tasks WHERE id = $id";
$result = $con->query($sql);

$task = null;

if ($result->num_rows > 0) {
    $task = $result->fetch_assoc();
}

mysqli_close($con);

echo json_encode($task);
?>
