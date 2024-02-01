<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


require 'classes/LeitorProdutos.php';
require 'classes/LeitorVendas.php';
require 'classes/Venda.php';
require 'classes/Produto.php';

$mensagem    = readline("digite uma mensagem:");
$produtosCsv = fopen('csv/products.csv', "r");
$produtos    = new LeitorProdutos($produtosCsv);
$produtos    = $produtos->getProdutos();

$vendasCsv   = fopen('csv/orders.csv', "r");
$vendas      = new LeitorVendas($vendasCsv);
$vendas      = $vendas->getVendas();

$produtosVendas = array();
$novoCsv        = fopen('csv/products_orders.csv', "w");

for ($produto = 0; $produto < count($produtos); $produto++) {
    $produtosVendas[$produto]["total_vendido"]        = 0;
    $produtosVendas[$produto]["Data_ultima_venda"][0] = 0;

    for ($venda = 0; $venda < count($vendas); $venda++) {
        if ($vendas[$venda]->getProductID() == $produtos[$produto]->getProductID()) {
            $produtosVendas[$produto]["product_ID"]                = $produtos[$produto]->getProductID();
            $produtosVendas[$produto]["preço_unitario"]            = $produtos[$produto]->getPrice();
            $produtosVendas[$produto]["Data_ultima_venda"][$venda] = $vendas[$venda]->getDate();
            $produtosVendas[$produto]["total_vendido"]            += $vendas[$venda]->getQuantity();
            $produtosVendas[$produto]["valor_total_vendido"]       = $produtosVendas[$produto]["total_vendido"] * $produtos[$produto]->getPrice();
        }
    }

    $produtosVendas[$produto]["Data_ultima_venda"] = max($produtosVendas[$produto]["Data_ultima_venda"]);
    if ($produtosVendas[$produto]["Data_ultima_venda"]  == 0) {
        $produtosVendas[$produto]["Data_ultima_venda"]   = 0;
        $produtosVendas[$produto]["product_ID"]          = $produtos[$produto]->getProductID();
        $produtosVendas[$produto]["preço_unitario"]      = $produtos[$produto]->getPrice();
        $produtosVendas[$produto]["total_vendido"]       = 0;
        $produtosVendas[$produto]["valor_total_vendido"] = 0;
    }
}

fputcsv($novoCsv, array_keys($produtosVendas[0]));
fputcsv($novoCsv, array());
foreach ($produtosVendas as $linha) {
    fputcsv($novoCsv, $linha);
}

$mail             = new PHPMailer(true);
$mail->isSMTP();    
$mail->SMTPAuth   = true;
$mail->Username   = 'testecauam@gmail.com';
$mail->Password   = 'djow udyr trvo etew ';
$mail->SMTPSecure = 'tls';
$mail->Host       = 'smtp.gmail.com';
$mail->Port       = 587;

$mail->setFrom('testecauam@gmail.com', 'Caua');
$mail->addAddress('testecauam@gmail.com', 'Caua');

$mail->Subject = 'Desafio2';
$mail->Body    = $mensagem;
$mail->AddAttachment( 'csv/products_orders.csv' , 'file.csv' );
$mail->send();

echo "o email foi enviado \n";

fclose($novoCsv);
fclose($vendasCsv);
fclose($produtosCsv);
