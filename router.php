<?php
//importa o arquivo de configuracao
require 'config.php';
require HELPERS_FOLDER.'autoloaders.php';

//pega a url requisitada
$url = $_SERVER['REQUEST_URI'];
//remove a base da url
$urlClean = str_replace(BASE_PATH, '', $url);
$urlArray = explode('/',$urlClean);

if(isset($urlArray[0]) && $urlArray[0] != '' &&
   isset($urlArray[1]) && $urlArray[1] != ''
){
    $controller = $urlArray[0].'Controller';
    $action = str_replace('-', '', $urlArray[1]);
    if(file_exists(CONTROLLERS_FOLDER.$controller.'.php')){
        $obj = new $controller();
        if(method_exists($obj, $action)){
            $obj->$action();
            die;
        }
    }
} 

$output = new Output();
$output->notFound();
?>