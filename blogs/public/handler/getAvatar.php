<?php

include '../../webadmin/configs/mySQLConfig.php';
class avatar {
    var $arr = array();
    function getAvatarByID($id){
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT * FROM user_profiles WHERE user_id = '".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->arr[] = $row;
            }
            return json_encode($this->arr);
        } else {

        }
    }
}
?>