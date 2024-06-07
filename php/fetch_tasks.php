<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "taskmanagerapp";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tasks";
$result = $con->query($sql);

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

mysqli_close($con);

echo json_encode($tasks);
?>
