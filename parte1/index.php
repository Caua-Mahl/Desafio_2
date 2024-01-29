<?php

require 'vendor/autoload.php';

$vendas       = fopen('orders.csv', "r");
$produtos     = fopen('products.csv', "r");
$linhas       = [];

while (($dados = fgetcsv($produtos, 1000, ",")) !== FALSE) {
    $linhas[] = $dados;
}

//array_shift($linhas);

/*echo "<pre>";
var_dump(fgetcsv($vendas,1000,","));
var_dump(fgetcsv($produtos,1000,","));*/

echo "<pre>";
foreach ($linhas as $linha) {
    var_dump($linha);
}
foreach ($linhas as $linha) {
    $produtosNovo= array("product_id" => $linha[0], "name" => $linha[1], "price" => $linha[2]);
}

var_dump($produtosNovo);

fclose($vendas);
fclose($produtos);