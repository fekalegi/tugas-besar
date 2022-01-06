<?php
include '../../../webadmin/configs/mySQLConfig.php';
include_once 'checkRole.php';
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
session_start();
//Init Role Check
$role = new checkRole();
$getRole = $role->getByID($_SESSION['user_id']);
//Check if user exist or no
if ($getRole == null){
    echo "<script>alert('User Not Exist')</script>";
    exit();
}else {
    //decode json and assign value to its variable
    $arr = json_decode($getRole);
    foreach ($arr as $key){
        $username = $key->username;
        $role_id = $key->role_id;
    }
}
//Init Database Connection
$db = new Database();
$conn = $db->DBConnect();

//get current date time
$currentDateTime = date('Y-m-d H:i:s');

$action = $_GET['action'];
switch ($action) {
    case 'create':
        print_r($_POST);
        $sql = "INSERT INTO posts (author, title, header_image, body, created_date) 
VALUES ('" . $username . "','" . $_POST['title'] . "','" . $_POST['headerUrl'] . "','" . $_POST['body'] . "','" . $currentDateTime . "')";
        if ($conn->query($sql) === TRUE) {
            //get the id
            $last_id = $conn->insert_id;
            echo "<script type='text/javascript'>window.location = '../blog.php?page=".$last_id."'</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Error' + $conn->error);window.location = '../post.php'</script>";
        }
        break;
    case 'update':
        
        $sql = "UPDATE posts SET author = '" . $username  . "', title = '" . $_POST['title'] . "'
        , header_image = '" . $_POST['last_name'] . "' , body = '" . $_POST['gender'] . "' , updated_date = '" . $_POST['email'] . "' 
        WHERE id = '" . $_POST['id'] . "'";
        echo $conn->error;
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>window.location = '../blog.php?page="+$_POST['id']+"'</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'delete':
        
        $sql = "DELETE FROM posts WHERE id = ".$_POST['id']. "";
        echo $conn->error;
        if ($conn->query($sql) === TRUE) {
            echo "<script type='text/javascript'>window.location = '../account.php?action=success'</script>";

            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}


$conn->close();
?>