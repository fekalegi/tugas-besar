<?php
include '../../webadmin/configs/mySQLConfig.php';
class Posts {
    var $arr = array();
    function getByID($id){
        $db = new Database();
        $conn = $db->DBConnect();
        $sql = "SELECT * FROM posts WHERE id = '".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $this->arr[] = $row;
            }
            return json_encode($this->arr);
        } else {

        }
    }

    function getAll($limit, $offset, $parameter)
    {
        $db = new Database();
        $conn = $db->DBConnect();
        if (empty($parameter)) {
            $sql = "SELECT * FROM posts LIMIT $limit OFFSET $offset";
        } else {
            $sql = "SELECT * FROM posts WHERE posts.author LIKE '%$parameter%' OR posts.title LIKE '%$parameter%' LIMIT $limit OFFSET $offset";
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
        $sql = "SELECT COUNT(*) AS total_records FROM posts";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return json_encode($result->fetch_assoc());
        } else {
            echo "0 results";
        }
    }
}
?>