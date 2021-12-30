<?php

class Database
{

    var $servername = "localhost";
    var $username = "local";
    var $password = "admin123";
    var $dbname = "mt-blog";

    public function DBConnect()
    {
        try {

// Create connection
            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($conn->connect_error) {
                echo "Connection Failed";
            }else{
                return $conn;
            }
        } catch (mysqli_sql_exception $e) {
// Check connection
                return "Connection failed";
        }
    }
}


?>
