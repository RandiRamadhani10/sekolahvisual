<?php
require_once "../data/function.php";
$request = json_decode(file_get_contents('php://input'), true);
$requestMethod = $_SERVER['REQUEST_METHOD'];
switch ($requestMethod) {
    case 'POST':
        try {
            hapusMateri($request);
            if (mysqli_affected_rows($conn) > 0) {
                $response['status'] = 'sukses';
                echo json_encode($response);
                exit;
            } else {
                $response['status'] = 'gagal';
                echo json_encode($response);
                exit;
            }   
        } catch(Exception $error){
            http_response_code(500);
            $response['status'] = 'error';
            $response['message'] = $error->getMessage();
            echo json_encode($response);
            exit;
        }
        break;
}
?>