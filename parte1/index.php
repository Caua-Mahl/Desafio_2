<?php

require 'vendor/autoload.php';
require 'classes/LeitorProdutos.php';
require 'classes/LeitorVendas.php';
require 'classes/Venda.php';
require 'classes/Produto.php';

$produtosCsv = fopen('csv/products.csv', "r");
$produtos    = new LeitorProdutos($produtosCsv);
$produtos    = $produtos->getProdutos();

$vendasCsv   = fopen('csv/orders.csv', "r");
$vendas      = new LeitorVendas($vendasCsv);
$vendas      = $vendas->getVendas();

$produtosVendas = array();

echo "<pre>";
//var_dump($produtos);
//var_dump($vendas[0]->getQuantity());

/*for($venda = 0; $venda < count($vendas); $venda++){
    for($produto = 0; $produto < count($produtos); $produto++){
        if($vendas[$venda]->getProductID() == $produtos[$produto]->getProductID()){
            echo "N=$venda Venda: " . $vendas[$venda]->getOrderID() . " | Produto: " . $produtos[$produto]->getProductID() . " | Quantidade: " . $vendas[$venda]->getQuantity() . " | Preço: " . $produtos[$produto]->getPrice() . "<br>";
            //ID do produto, preço unitário, data da última venda, quantidade total vendida e valor total vendido

        }
    }
}*/

//juntando as duas tabelas, pra cada produto vejo se tem uma venda que bata o ID, se tiver puxo os dados que quero
/*for ($produto = 0; $produto < count($produtos); $produto++) {
    for ($venda = 0; $venda < count($vendas); $venda++) {
        if ($vendas[$venda]->getProductID() == $produtos[$produto]->getProductID()) {
            //ID do produto, preço unitário, data da última venda, quantidade total vendida e valor total vendido
            $produtosVendas[$produto]["product_ID"]          = $produtos[$produto]->getProductID();
            $produtosVendas[$produto]["preço_unitario"]      = $produtos[$produto]->getPrice();
            $produtosVendas[$produto]["Data_ultima_venda"]   = $vendas[$venda]->getDate();
            $produtosVendas[$produto]["total_vendido"]      += $vendas[$venda]->getQuantity();
            $produtosVendas[$produto]["valor_total_vendido"] = $produtosVendas[$produto]["total_vendido"]* $produtos[$produto]->getPrice();
        }
    }
}*/
var_dump($produtosVendas);
//if(strtotime($vendas[$venda]->getDate()) > strtotime($produtosVendas[$produto]["Data_ultima_venda"]){
    //$produtosVendas[$produto]["Data_ultima_venda"]   = $vendas[$venda]->getDate();

fclose($vendasCsv);
fclose($produtosCsv);
