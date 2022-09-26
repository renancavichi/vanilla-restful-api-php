<?php
class Output{
    static function response($arrayResponse, $statusCode = 200){
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: '.ALLOWED_HOSTS);
        echo json_encode($arrayResponse);
        die;
    }

    static function notFound(){
        $result["error"]['message'] = "API endpoint not found!";
        self::response($result, 404);
    }
}
?>