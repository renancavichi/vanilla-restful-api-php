<?php 
class Database{
    static function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "renan2022";
        
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
        } catch(PDOException $e) {
            self::dbError($e);
        }
    }

    static function dbError($e){
        $result["error"]["message"] = "Server error, please try again!";
        $result["error"]["database"] = $e;
        Output::response($result, 500);
    }
}
?>