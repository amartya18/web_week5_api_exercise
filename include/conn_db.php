<?php

class Database {
    $servername = "localhost";
    $username = "amartya";
    $password = "";
    $dbname = "web_week5_php_api";

    public function getConnection() {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if($conn->connect_error){
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}

?>
