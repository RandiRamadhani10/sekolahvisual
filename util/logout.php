<?php
// require_once "../data/config.php";
session_start();
$request = json_decode(file_get_contents('php://input'), true);
$requestMethod = $_SERVER['REQUEST_METHOD'];
switch ($requestMethod) {
    case 'GET':
        $response['status'] ='sukses';
        session_destroy();
        echo json_encode($response);
        exit;
        break;
}
