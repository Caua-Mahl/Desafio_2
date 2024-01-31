<?php
require 'classes/RequisitorCurl.php';
require 'classes/Requisiçao.php';
require 'classes/Roteador.php';
require 'classes/Controlador.php';

header('Content-Type: application/json');
$requisicao = new Requisiçao($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
http_response_code(200);
Roteador::rotear($requisicao);
