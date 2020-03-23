<?php
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

    if(!empty($data->key) && !empty($data->Studentid)) {
        $student->key = (int)$data->key;
        $student->Studentid = $data->Studentid;
        if($student->delete()){    
            http_response_code(200); // success
            echo json_encode(array("success" => true));
        } else {    
            http_response_code(500); // server error 
            echo json_encode(array("success" => false));
        }
    } else {
        http_response_code(400); // client error 
        echo json_encode(array("success" => false));
    }
} else {
    http_response_code(400); // client error wrong request method
    echo json_encode(array("success" => false));
}

?>
