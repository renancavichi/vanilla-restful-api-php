<?php
require('config.php');

echo 'Abriu o router.php<br>';

$url = $_SERVER['REQUEST_URI'];

echo BASE_PATH.'<br>';
echo $url;
?>