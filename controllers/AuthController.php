<?php
class AuthController{

    public function login(){
        Router::allowedMethod('POST');

        $data = Input::getData();
        $email = $data['email'];
        $pass = sha1($data['pass']);

        $user = new User(null, null, $email, $pass, null);
        $userLogged = $user->login();
        
        if(is_array($userLogged)){
            $token = sha1(uniqid(rand(), true));
            $client = $_SERVER['HTTP_USER_AGENT'];
            $session = new Session(null, $userLogged['id'], $token, $client);
            $sessionId = $session->create();
            if($sessionId){
                $result["success"]["message"] = "User logged successfully!";
                $result["data"]["idUser"] = $userLogged['id'];
                $result["data"]["token"] = $token;
                $result["data"]["role"] = $userLogged['role'];
                setcookie('id_user', $userLogged['id'], (time() + 60 * 60 * 24 * 30 * 6), "/");
                setcookie('token', $token, (time() + 60 * 60 * 24 * 30 * 6), "/");
                Output::response($result);
            } else{
                $result["error"]["message"] = "Error creating session! Please, try again";
                Output::response($result, 500);
            }
        } else {
            $result["error"]["message"] = "Email or password invalid! Please, try again.";
            Output::response($result, 401);
        }
    }

    public function logout(){
        Router::allowedMethod('POST');

        $idUser = '';
        $token = '';

        if(isset($_COOKIE['id_user']))
            $idUser = $_COOKIE['id_user'];
        
        if(isset($_COOKIE['token']))
            $token = $_COOKIE['token'];

        $data = Input::getData();
        if(!$idUser)
            $idUser = $data['idUser'];
        if(!$token)
            $token = $data['token'];

        $session = new Session(null, $idUser, $token, null);
        $wasDeleted = $session->delete();

        if($wasDeleted){
            $result["success"]["message"] = "User logged out successfully!";
            Output::response($result);
        } else {
            $result["error"]["message"] = "Error logging out! Please, try again";
            Output::response($result, 500);
        }
    }
}
?>