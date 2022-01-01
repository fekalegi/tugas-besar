<?php
include __DIR__ . '/../../configs/mySQLConfig.php';

class Profiles
{
    var $arr = array();

    function getAll($limit, $offset, $parameter)
    {
        $db = new Database();
        $conn = $db->DBConnect();
        if (empty($parameter)) {
            $sql = "SELECT * FROM user_profiles LIMIT $limit OFFSET $offset";
        } else {
            $sql = "SELECT * FROM user_profiles WHERE first_name LIKE '%$parameter%' OR last_name LIKE '%$parameter%' OR email LIKE '%$parameter%'
OR phone_number LIKE '%$parameter%' LIMIT $limit OFFSET $offset";
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
        $sql = "SELECT COUNT(*) AS total_records FROM user_profiles";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return json_encode($result->fetch_assoc());
        } else {
            echo "0 results";
        }
    }
}

?>