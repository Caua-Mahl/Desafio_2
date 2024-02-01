<?php
require "Funcionarios.php";
require "Conexao.php";

$pg = "postgres";
$conexao= new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();

echo "<br>";

$funcionario1 = new Funcionarios();
$funcionario2 = new Funcionarios();
$funcionario3 = new Funcionarios();
$funcionario4 = new Funcionarios();

$funcionario1->criar("Naruto",   "m", 22, 2000, $conexao->getConn());
$funcionario2->criar("Vayne",    "f", 25, 3000, $conexao->getConn());
$funcionario3->criar("Vegeta",   "m", 30, 4000, $conexao->getConn());
$funcionario4->criar("Hermione", "f", 35, 5000, $conexao->getConn());

echo "<br>";

$funcionario1->mudarNome("Messi",      $conexao->getConn());
$funcionario2->mudarNome("Lulu",       $conexao->getConn());
$funcionario3->mudarNome("Ronaldinho", $conexao->getConn());
$funcionario4->mudarNome("Daenerys",   $conexao->getConn());

echo "<br>";

$funcionario1->darAumento("200%", $conexao->getConn());
$funcionario2->darAumento("50%",  $conexao->getConn());
$funcionario3->darAumento("20%",  $conexao->getConn());
$funcionario4->darAumento("60%",  $conexao->getConn());

echo "<br>";

Funcionarios::listarTodos($conexao->getConn());

echo "<br>";

$funcionario3Id = $funcionario3->getId();
unset($funcionario3);
$funcionario3   = new Funcionarios();
$funcionario3->setId($funcionario3Id);
$funcionario3->puxarDados($conexao->getConn());

echo "<pre>";

var_dump($funcionario3);

echo "</pre>";

echo "<br>";

Funcionarios::deletarTodos($conexao->getConn());

echo "<br>";

Funcionarios::listarTodos($conexao->getConn());

$conexao->desconectar();



