<?php
class Student {
    public $key;
    public $studentId;
    public $name;
    public $password;

    public $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function insert()
    {
        $stmt = $this->conn->prepare("INSERT INTO student (studentid, name, password) VALUES (?, ?,?)");

        $this->studentId = htmlspecialchars(strip_tags($this->studentId)); // striping might be better in create.php
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->password = $this->password;

        $stmt->bind_param("sss", $this->studentId, $this->name, $this->password); // sss indicates 3 strings being inserted to the db

        if($stmt->execute()) {
            return true;
        }

        return False;
    }

    function read() {
        if ($this->key) { // read exact one student
            $stmt = $this->conn->prepare("SELECT * FROM student WHERE no = ?");
            $stmt->bind_param("i", $this->key);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM student");
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    function update() {
        $this->studentId = htmlspecialchars(strip_tags($this->studentId)); // striping might be better in create.php
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->key = htmlspecialchars(strip_tags($this->key));

        if(!empty($this->password)) {
            $stmt = $this->conn->prepare("UPDATE student SET studentid = ?, name = ?, password = ? WHERE no = ?");
            $this->password = htmlspecialchars(strip_tags($this->password));
            $stmt->bind_param("ssss", $this->studentId, $this->name, $this->password, $this->key);
        } else {
            $stmt = $this->conn->prepare("UPDATE student SET studentid = ?, name = ? WHERE no = ?");
            $stmt->bind_param("sss", $this->studentId, $this->name, $this->key);
        }


        if($stmt->execute()) {
            return true;
        }

        return False;
    }

    function delete() {
        $stmt = $this->conn->prepare("DELETE FROM student WHERE no = ?");

        $this->key = strip_tags($this->key);
        $stmt->bind_param("i", $this->key);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
