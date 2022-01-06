<?php
include '../../../webadmin/configs/mySQLConfig.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
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
            session_start();
            $_SESSION['avatar'] = $_POST['avatarUrl'];
            echo "<script type='text/javascript'>window.location = '../account.php?action=success'</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Error' + $conn->error);window.top.location.reload();</script>";
        }
        break;
    case 'update':
        
        $sql = "UPDATE user_profiles SET avatar = '".$_POST['avatarUrl']."',first_name = '".$_POST['first_name']."'
        , last_name = '".$_POST['last_name']."' , gender = '".$_POST['gender']."' , email = '".$_POST['email']."' 
        , phone_number = '".$_POST['phone_number']."' 
        WHERE user_id = '".$_POST['user_id']."'";
        echo$conn->error;
        if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['avatar'] = $_POST['avatarUrl'];
            echo "<script type='text/javascript'>window.location = '../account.php?action=success'</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}


$conn->close();
?>