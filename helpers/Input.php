<?php
class Input{
    static function getData(){
        $jsonData = file_get_contents("php://input");
        return json_decode($jsonData, true);
    }
}
?>