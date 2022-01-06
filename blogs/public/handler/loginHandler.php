<?php
include '../../../webadmin/configs/mySQLConfig.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
$db = new Database();
$conn = $db->DBConnect();
$action = $_GET['action'];
$username = $_POST['username'];
$password = $_POST['password'];
switch ($action) {
    case 'login' :
        $sql = "SELECT users.username AS username
, users.id AS id, users.role_id , up.avatar AS avatar FROM users LEFT JOIN user_profiles up on users.id = up.user_id WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];
            $_SESSION['avatar'] = $row['avatar'];
            echo "<script>window.location = '../index.php';</script>";
        } else {
            echo "0 results";
        }
        break;
    case 'logout':
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'>alert('logout success');window.location = '../login.php';</script>";

}

?>