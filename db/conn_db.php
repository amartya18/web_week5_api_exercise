<?php
class Database {
    private $servername = "localhost";
    private $username = "amartya";
    private $password = "";
    private $dbname = "web_week5_php_api";

    public function getConnection() {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if($conn->connect_error){
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}

?>
