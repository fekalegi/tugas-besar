<?php
include __DIR__ . '/../../configs/mySQLConfig.php';

class Roles
{
    var $arr = array();

    function getAll($limit, $offset, $parameter)
    {
        $db = new Database();
        $conn = $db->DBConnect();
        if (empty($parameter)) {
            $sql = "SELECT * FROM roles LIMIT $limit OFFSET $offset";
        } else {
            $sql = "SELECT * FROM roles WHERE name LIKE '%$parameter%' OR level LIKE '%$parameter%'
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
        $sql = "SELECT COUNT(*) AS total_records FROM roles";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return json_encode($result->fetch_assoc());
        } else {
            echo "0 results";
        }
    }
}

?>