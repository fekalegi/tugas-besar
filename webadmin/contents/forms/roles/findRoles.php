<?php

class Roles {
    var $arr = array();
    function getByID($id){
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT * FROM roles WHERE id = '".$id."'";
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