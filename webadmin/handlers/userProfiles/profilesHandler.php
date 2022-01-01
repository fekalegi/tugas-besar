<?php
include '../../configs/mySQLConfig.php';
$db = new Database();
$conn = $db->DBConnect();
$action = $_GET['action'];
print_r($_POST);
switch ($action) {
    case 'create':
        print_r($_POST);
        $sql = "INSERT INTO user_profiles (user_id, avatar, first_name, last_name, gender, email, phone_number) 
VALUES ('".$_POST['user_id']."','".$_POST['avatarUrl']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['gender']."',
'".$_POST['email']."','".$_POST['phone_number']."')";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been created');window.top.location.reload();</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Error' + $conn->error);window.top.location.reload();</script>";
        }
        break;
    case 'update':
        echo "TEST";
        $sql = "UPDATE user_profiles SET avatar = '".$_POST['avatarUrl']."',first_name = '".$_POST['first_name']."'
        , last_name = '".$_POST['last_name']."' , gender = '".$_POST['gender']."' , email = '".$_POST['email']."' 
        , phone_number = '".$_POST['phone_number']."' 
        WHERE id = '".$_POST['id']."'";
        echo$conn->error;
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been updated');window.top.location.reload();</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'delete':
        echo "test";
        $sql = "DELETE FROM user_profiles WHERE id = ". $_GET['id'] . "";
        echo "TEST";
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>alert('data has been deleted');window.location = '../../index.php?page=user_profiles';</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}


$conn->close();
?>