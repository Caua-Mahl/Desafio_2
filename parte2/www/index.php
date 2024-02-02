<?php
require "Funcionarios.php";
require "Conexao.php";

$pg      = "postgres";
$conexao = new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();
$conn    = $conexao->getConn();

$funcionario1 = new Funcionarios();
$funcionario2 = new Funcionarios();
$funcionario3 = new Funcionarios();
$funcionario4 = new Funcionarios();

$funcionario1->criar("Naruto",   "m", 22, 2000, $conn);
$funcionario2->criar("Vayne",    "f", 25, 3000, $conn);
$funcionario3->criar("Vegeta",   "m", 30, 4000, $conn);
$funcionario4->criar("Hermione", "f", 35, 5000, $conn);

echo "<br>";

$funcionario1->mudarNome("Messi",      $conn);
$funcionario2->mudarNome("Lulu",       $conn);
$funcionario3->mudarNome("Ronaldinho", $conn);
$funcionario4->mudarNome("Velma",      $conn);

echo "<br>";

$funcionario1->darAumento("200%", $conn);
$funcionario2->darAumento("50%",  $conn);
$funcionario3->darAumento("20%",  $conn);
$funcionario4->darAumento("60%",  $conn);

echo "<br>";

Funcionarios::listarTodos($conn);

echo "<br>";

$funcionario3Id = $funcionario3->getId();
unset($funcionario3);
$funcionario3 = new Funcionarios();
$funcionario3->setId($funcionario3Id);
$funcionario3->puxarDados($conn);

echo "<pre>";
var_dump($funcionario3);
echo "</pre>";

Funcionarios::deletarTodos($conn);
Funcionarios::listarTodos($conn);
$conexao->desconectar();



