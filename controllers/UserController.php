<?php
class UserController{
    function signup(){
        $route = new Router();
        $route->allowedMethod('POST');

        //pegar as entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = sha1($_POST['pass']);
        $avatar = $_POST['avatar'];
        //validar os campos
        //TODO

        //executar a operacao de banco
        $user = new User(null, $name, $email, $pass, $avatar);
        $id = $user->create();

        //dar a saída
        $result["success"]["message"] = "User created successfully!";

        $result["user"]["id"] = $id;
        $result["user"]["name"] = $name;
        $result["user"]["email"] = $email;
        $result["user"]["pass"] = $pass;
        $result["user"]["avatar"] = $avatar;

        $output = new Output();
        $output->response($result);
    }

    function list(){
        $route = new Router();
        $route->allowedMethod('GET');

        $user = new User(null, null, null, null, null);
        $listUsers = $user->list();

        $result["success"]["message"] = "User list has been successfully listed!";
        $result["data"] = $listUsers;

        $output = new Output();
        $output->response($result);
    }

    function byId(){
        $route = new Router();
        $route->allowedMethod('GET');

        $output = new Output();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $result['error']['message'] = "Id parameter required!";
            $output->response($result, 406);
        }
        
        $user = new User($id, null, null, null, null);
        $userData = $user->getById();

        if($userData){
            $result["success"]["message"] = "User successfully selected!";
            $result["data"] = $userData;
            $output->response($result);
        } else {
            $result["error"]["message"] = "User not found!";
            $output->response($result, 404);
        }
    }

    function delete(){
        $route = new Router();
        $route->allowedMethod('DELETE');

        $output = new Output();

        //get json input by body json
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        if(isset($data['id'])){
            $id = $data['id'];
        } else {
            $result['error']['message'] = "Id parameter required!";
            $output->response($result, 406);
        }

        $user = new User($id, null, null, null, null);
        $deleted = $user->delete();

        if($deleted){
            $result["success"]["message"] = "User $id deleted successfully!";
            $output->response($result);
        } else {
            $result["error"]["message"] = "User $id not found to be deleted!";
            $output->response($result, 404);
        }
    }
}
?> 