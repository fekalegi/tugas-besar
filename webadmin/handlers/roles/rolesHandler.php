<?php
include '../../configs/mySQLConfig.php';
$db = new Database();
$conn = $db->DBConnect();
$action = $_GET['action'];
echo $_GET['id'];
switch ($action) {
    case 'create':
        $sql = "INSERT INTO roles (name, level) 
VALUES ('".$_POST['name']."','".$_POST['level']."')";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been created');window.top.location.reload();</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Error' + $conn->error);window.top.location.reload();</script>";
        }
        break;
    case 'update':
        $sql = "UPDATE roles SET name = '".$_POST['name']."',level = '".$_POST['level']."' 
        WHERE id = '".$_POST['id']."'";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been updated');window.top.location.reload();</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'delete':
        echo "test";
        $sql = "DELETE FROM roles WHERE roles.id = ". $_GET['id'] . "";
        echo "TEST";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been deleted');window.location = '../../index.php?page=roles';</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}


$conn->close();
?>