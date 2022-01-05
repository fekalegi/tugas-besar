<?php
include '../../../webadmin/configs/mySQLConfig.php';

$db = new Database();
$conn = $db->DBConnect();
$sql = "INSERT INTO users (username, password, role_id) 
VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "', '3')";
if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.location = '../sign-in.php?signup=success';</script>";

    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>