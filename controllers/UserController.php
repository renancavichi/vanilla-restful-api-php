<?php
class UserController{
    function signup(){
        //pegar as entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = sha1($_POST['pass']);
        $avatar = $_POST['avatar'];
        //validar os campos

        //executar a operacao de banco
        $user = new User(null, $name, $email, $pass, $avatar);
        $id = $user->create();

        //dar a saida
        $result["success"]["message"] = "User created successfully!";

        $result["user"]["id"] = $id;
        $result["user"]["name"] = $name;
        $result["user"]["email"] = $email;
        $result["user"]["pass"] = $pass;
        $result["user"]["avatar"] = $avatar;


        $output = new Output();
        $output->response($result);
    }
}
?> 