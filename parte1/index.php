<?php

require_once 'vendor\autoload.php';
require_once 'classes/LeitorCsv.php';
require_once 'classes/Vendas.php';
require 'classes/Produto.php';

$vendasCsv      = fopen('csv\orders.csv', "r");
$produtosCsv   = fopen('csv\products.csv', "r");
$a=new LeitorCsv($produtosCsv);
$a = $a->getProdutos();
/*echo "<pre>";
var_dump(fgetcsv($vendas,1000,","));
var_dump(fgetcsv($produtos,1000,","));

echo "<pre>";
foreach ($linhas as $linha) {
    var_dump($linha);
}*/



echo "<pre>";
var_dump( $a[0]);

fclose($vendasCsv);
fclose($produtosCsv);