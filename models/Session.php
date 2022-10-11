<?php
class Session{

    public $id;
    public $idUser;
    public $token;
    public $client;

    function __construct($id, $idUser, $token, $client) {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->token = $token;
        $this->client = $client;
    }

    public function create(){
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("INSERT INTO session (id_user, token, client)
            VALUES (:id_user, :token, :client)");
            $stmt->bindParam(':id_user', $this->idUser);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':client', $this->client);
            $stmt->execute();
            $id = $conn->lastInsertId();
            $conn = null;
            return $id;
        }catch(PDOException $e) {
            Database::dbError($e);
        }
    }

    function delete(){
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("DELETE FROM session WHERE id_user = :id_user AND token = :token;");
            $stmt->bindParam(':id_user', $this->idUser);
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            $conn = null;
            if($rowsAffected){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e) {
            Database::dbError($e);
        }
    }

    function verifyToken($role){
        $role = '%'.$role.'%';
        $conn = Database::connect();
        
        try{
            $stmt = $conn->prepare("SELECT s.id_user FROM session as s INNER JOIN users as u ON s.id_user = u.id WHERE s.id_user = :id_user AND s.token = :token AND u.role like :role ;");
            $stmt->bindParam(':id_user', $this->idUser);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $session = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            if(is_array($session)){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e) {
            Database::dbError($e);
        }
    }
}
?>