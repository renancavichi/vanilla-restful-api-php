<?php
class Produto{
    // Propriedades
    public $id;
    public $imagem;
    public $nome; 
    public $preco; 

    // Métodos (Funções)
    function definirPreco($novoPreco){
        $this->preco = $novoPreco;
    }

    function mostrarPreco(){
        echo $this->preco;
    }

    function definirNome($novoNome){
        $this->nome = $novoNome;
    }

    function mostrarNome(){
        echo $this->nome;
    }  
}


$prod = new Produto();

$prod->definirPreco(10);
$prod->definirNome("TV 40 Polegadas");

echo "Valor = ";
$prod->mostrarPreco();

echo "<br>Nome = ";
$prod->mostrarNome();

echo "<br>----------------<br>";

$prod2 = new Produto();

$prod2->definirPreco(20);
$prod2->definirNome("TV 60 Polegadas");

echo "Valor = ";
$prod2->mostrarPreco();

echo "<br>Nome = ";
$prod2->mostrarNome();
?>