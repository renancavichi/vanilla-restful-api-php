<?php
class UserController{
    function signup(){
        Router::allowedMethod('POST');
        
        $data = Input::getData();
        $name = $data['name'];
        $email = $data['email'];
        $pass = sha1($data['pass']);
        $avatar = $data['avatar'];

        //TODO validar os campos

        $user = new User(null, $name, $email, $pass, $avatar);
        $id = $user->create();

        $result["success"]["message"] = "User created successfully!";
        $result["user"] = $data;
        $result["user"]["id"] = $id;
        Output::response($result);
    }

    function list(){
        Router::allowedMethod('GET');

        $user = new User(null, null, null, null, null);
        $listUsers = $user->list();

        $result["success"]["message"] = "User list has been successfully listed!";
        $result["data"] = $listUsers;
        Output::response($result);
    }

    function byId(){
        Router::allowedMethod('GET');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $result['error']['message'] = "Id parameter required!";
            Output::response($result, 406);
        }
        
        $user = new User($id, null, null, null, null);
        $userData = $user->getById();

        if($userData){
            $result["success"]["message"] = "User successfully selected!";
            $result["data"] = $userData;
            Output::response($result);
        } else {
            $result["error"]["message"] = "User not found!";
            Output::response($result, 404);
        }
    }

    function delete(){
        Router::allowedMethod('DELETE');
        $data = Input::getData();

        if(isset($data['id'])){
            $id = $data['id'];
        } else {
            $result['error']['message'] = "Id parameter required!";
            Output::response($result, 406);
        }

        $user = new User($id, null, null, null, null);
        $deleted = $user->delete();

        if($deleted){
            $result["success"]["message"] = "User $id deleted successfully!";
            Output::response($result);
        } else {
            $result["error"]["message"] = "User $id not found to be deleted!";
            Output::response($result, 404);
        }
    }
}
?> 