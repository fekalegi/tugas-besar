<?php
include __DIR__ . '/../../configs/mySQLConfig.php';

class Users
{
    var $arr = array();

    function getAll($limit, $offset, $parameter)
    {
        $db = new Database();
        $conn = $db->DBConnect();
        if (empty($parameter)) {
            $sql = "SELECT users.id, users.username, roles.name FROM users LEFT JOIN roles ON users.role_id = roles.id LIMIT $limit OFFSET $offset";
        } else {
            $sql = "SELECT users.id, users.username, roles.name FROM users LEFT JOIN roles ON users.role_id = roles.id
 WHERE users.username LIKE '%$parameter%' OR roles.name LIKE '%$parameter%'
 LIMIT $limit OFFSET $offset";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->arr[] = $row;
            }
            return json_encode($this->arr);
        } else {
            echo "0 results";
        }
    }

    function getPagination()
    {
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT COUNT(*) AS total_records FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return json_encode($result->fetch_assoc());
        } else {
            echo "0 results";
        }
    }
}

?>