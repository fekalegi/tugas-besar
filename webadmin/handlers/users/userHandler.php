<?php
include '../../configs/mySQLConfig.php';
$db = new Database();
$conn = $db->DBConnect();
$action = $_GET['action'];
echo $_GET['id'];
switch ($action) {
    case 'create':
        $sql = "INSERT INTO users (username, password, role_id) 
VALUES ('".$_POST['username']."','".$_POST['password']."', '".$_POST['role']."')";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been created');window.top.location.reload();</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'update':
        $sql = "UPDATE users SET username = '".$_POST['username']."',password = '".$_POST['password']."', role_id = '".$_POST['role']."' 
        WHERE id = '".$_POST['id']."'";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been updated');window.top.location.reload();</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM users WHERE id = ". $_GET['id'] . "";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been deleted');window.location = '../../index.php?page=users';</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}


$conn->close();
?>