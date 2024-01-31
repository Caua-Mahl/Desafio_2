<?php
require 'classes/RequisitorCurl.php';
require 'classes/Requisiçao.php';
require 'classes/Roteador.php';
require 'classes/Controlador.php';

//Warning: Cannot modify header information - headers already sent by (output started at /var/www/html/classes/Roteador.php:1)
//header('Content-Type: application/json');
$requisicao = new Requisiçao($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
http_response_code(200);
Roteador::rotear($requisicao);
