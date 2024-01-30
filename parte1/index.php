<?php

//biblioteca 
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

$produtosCsv = fopen('csv/products.csv', "r");
$produtos    = new LeitorProdutos($produtosCsv);
$produtos    = $produtos->getProdutos();

$vendasCsv   = fopen('csv/orders.csv', "r");
$vendas      = new LeitorVendas($vendasCsv);
$vendas      = $vendas->getVendas();

$produtosVendas = array();
$novoCsv        = fopen('csv/products_orders.csv', "w");

echo "<pre>";

for ($produto = 0; $produto < count($produtos); $produto++) {
    $produtosVendas[$produto]["total_vendido"] = 0; // declarei antes pois vai ser somado depois
    $produtosVendas[$produto]["Data_ultima_venda"][0]=0;
    for ($venda = 0; $venda < count($vendas); $venda++) {
        if ($vendas[$venda]->getProductID() == $produtos[$produto]->getProductID()) {
            //ID do produto, preço unitário, data da última venda, quantidade total vendida e valor total vendido
            $produtosVendas[$produto]["product_ID"]                = $produtos[$produto]->getProductID();
            //$produtosVendas[$produto]["nome"]                      = $produtos[$produto]->getName();
            $produtosVendas[$produto]["preço_unitario"]            = $produtos[$produto]->getPrice();
            $produtosVendas[$produto]["Data_ultima_venda"][$venda] = $vendas[$venda]->getDate();
            $produtosVendas[$produto]["total_vendido"]            += $vendas[$venda]->getQuantity();
            $produtosVendas[$produto]["valor_total_vendido"]       = $produtosVendas[$produto]["total_vendido"] * $produtos[$produto]->getPrice();
        }
    }

    //pegar ultima venda e devolver tambem os produtos sem vendas
    $produtosVendas[$produto]["Data_ultima_venda"] = max($produtosVendas[$produto]["Data_ultima_venda"]); //max retorna a data mais recente
    if ($produtosVendas[$produto]["Data_ultima_venda"]   == 0) {
        $produtosVendas[$produto]["Data_ultima_venda"]   = 0;
        $produtosVendas[$produto]["product_ID"]          = $produtos[$produto]->getProductID();
        $produtosVendas[$produto]["preço_unitario"]      = $produtos[$produto]->getPrice();
        $produtosVendas[$produto]["total_vendido"]       = 0;
        $produtosVendas[$produto]["valor_total_vendido"] = 0;
    }
}

//imprimindo linhas
fputcsv($novoCsv, array_keys($produtosVendas[0])); //cabeçalho
fputcsv($novoCsv, array());
foreach ($produtosVendas as $linha) {
    fputcsv($novoCsv, $linha);
}

//enviando csv para o gmail
$mail = new PHPMailer(true);
// Configurações do servidor
$mail->isSMTP();        //Devine o uso de SMTP no envio
$mail->SMTPAuth   = true; //Habilita a autenticação SMTP
$mail->Username   = 'testecauam@gmail.com';
$mail->Password   = 'djow udyr trvo etew ';
// Criptografia do envio SSL também é aceito
$mail->SMTPSecure = 'tls';
// Informações específicadas pelo Google
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
// Define o remetente e destinatário
$mail->setFrom('testecauam@gmail.com', 'Caua');
$mail->addAddress('testecauam@gmail.com', 'Caua');
// Conteúdo da mensagem
$mail->Subject = 'Desafio2';
$mail->Body    = 'Eai';
$mail->AddAttachment( 'csv/products_orders.csv' , 'file.csv' );
$mail->send();

//fechando arquivos
fclose($novoCsv);
fclose($vendasCsv);
fclose($produtosCsv);
