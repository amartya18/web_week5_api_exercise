<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db/conn_db.php';
include_once '../models/Student.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $database = new Database();
    $db = $database->getConnection();

    $student = new Student($db);

    $student->key = (isset($_GET['key']) && $_GET['key']) ? (int)$_GET['key'] : 0;

    $result = $student->read();

    if ($result->num_rows > 0) {
        $students = array();
        $students["records"] = array();
        while ($student = $result->fetch_assoc()) {
            extract($student);
            $studentDetail = array(
                "Key" => $no,
                "Name" => $name,
                "Studentid" => $studentid
            );
            array_push($students["records"], $studentDetail);
        }
        http_response_code(200); 
        echo json_encode($students);
    } 
} else {
    http_response_code(400);
    echo json_encode(
        array("success" => false)
    );
}

?>
