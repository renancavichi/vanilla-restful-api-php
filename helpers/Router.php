<?php
class Router {
    
    static function gateKeeper(){
        self::handleCORS();
        //pega a url requisitada
        $url = $_SERVER['REQUEST_URI'];
        //remove a base da url
        $urlClean = str_replace(BASE_PATH, '', $url);
        $urlArray = explode('/',$urlClean);

        if(isset($urlArray[0]) && $urlArray[0] != '' &&
        isset($urlArray[1]) && $urlArray[1] != ''
        ){
            $controller = $urlArray[0].'Controller';
            $removeParams = explode('?', $urlArray[1]);
            $action = str_replace('-', '', $removeParams[0]);
            if(file_exists(CONTROLLERS_FOLDER.$controller.'.php')){
                $obj = new $controller();
                if(method_exists($obj, $action)){
                    $obj->$action();
                    die;
                }
            }
        } 
    }
    
    
    static function allowedMethod($method){
        if ($_SERVER['REQUEST_METHOD'] !== $method){
            $result['error']['message'] = 'Method '.$_SERVER['REQUEST_METHOD'].' not allowed for this route!';
            Output::response($result, 405);
        }
    }

    static function handleCORS(){
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("Access-Control-Allow-Origin: ".ALLOWED_HOSTS);
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
            //header("Access-Control-Allow-Headers: Access-Token");
            die;
        }
    }
}
?>