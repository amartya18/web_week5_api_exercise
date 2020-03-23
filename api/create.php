<?php

use function PHPSTORM_META\type;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../db/conn_db.php';
include_once '../models/Student.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $student = new Student($db);

    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->Studentid) && !empty($data->Name) && !empty($data->pwdStudent)) {
        // key auto generate
        $student->studentId = $data->Studentid;
        $student->name = $data->Name;
        $student->password = password_hash(htmlspecialchars(strip_tags($data->pwdStudent)), PASSWORD_DEFAULT);

        if ($student->insert()) {
            echo json_encode(array("success" => true));
        } else {
            http_response_code(500); // server error
            echo json_encode(array("success" => false, "message" => "failed to insert database"));
        }
    } else {
        http_response_code(400); // client error
        echo json_encode(array("success" => false, "message" => "Data is incomplete"));
    }
} else {
    http_response_code(400); // client error
    echo json_encode(array("success" => false, "message" => "wrong request method"));
}
