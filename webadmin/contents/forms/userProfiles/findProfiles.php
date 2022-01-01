<?php

include '../../../configs/mySQLConfig.php';
class profilesForm {
    var $arr = array();
    function getByID($id){
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT * FROM user_profiles WHERE id = '".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->arr[] = $row;
            }
            return json_encode($this->arr);
        } else {
            echo "0 results";
        }
    }
    function getAllUsers() {
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT users.id, users.username FROM users LEFT JOIN user_profiles ON users.id = user_profiles.user_id WHERE user_profiles.id IS NULL";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->arr[] = $row;
            }
            return json_encode($this->arr);
        } else {
            echo "0 results";
        }
    }
}
?>