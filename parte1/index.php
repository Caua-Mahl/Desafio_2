<?php

require 'vendor\autoload.php';
require 'classes/Produto.php';
require 'classes/Vendas.php';

$vendasCsv      = fopen('csv\orders.csv', "r");
$produtosCsv   = fopen('csv\products.csv', "r");
$a=new Produto($produtosCsv);


/*echo "<pre>";
var_dump(fgetcsv($vendas,1000,","));
var_dump(fgetcsv($produtos,1000,","));

echo "<pre>";
foreach ($linhas as $linha) {
    var_dump($linha);
}*/



echo "<pre>";
var_dump($a);

fclose($vendasCsv);
fclose($produtosCsv);