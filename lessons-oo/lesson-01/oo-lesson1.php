<?php
// Lesson 1: Class, Objects, Constructor, Properties and Methods
require('Product.php');

$prod = new Product(null, null, null, null);

$prod->setPrice(10);
$prod->setName("TV 40' Polegadas");

$prod->name = "TV 40' Polegadas";

echo "Valor = ";
$prod->getPrice();

echo "<br>Nome = ";
$prod->getName();

echo '<br>Propriedade Name: '.$prod->name;

echo "<br>----------------<br>";

$prod2 = new Product(null, null, "TV 50'", 50);

echo "Valor = ";
$prod2->getPrice();

echo "<br>Nome = ";
$prod2->getName();
?>