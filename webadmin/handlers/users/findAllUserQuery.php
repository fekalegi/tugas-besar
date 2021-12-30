<?php
include  __DIR__ . '/../../configs/mySQLConfig.php';

class Users {
    var $arr = array();
    function getAll(){
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT users.id, users.username, roles.name  FROM users LEFT JOIN roles ON users.role_id = roles.id";
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