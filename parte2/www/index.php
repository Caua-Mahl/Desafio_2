<?php
require "Funcionarios.php";
require "Conexao.php";

$pg      = "postgres";
$conexao = new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();
$conn    = $conexao->getConn();

$funcionario1 = new Funcionarios("Naruto",   "m", 22, 2000, $conn);
$funcionario2 = new Funcionarios("Vayne",    "f", 25, 3000, $conn);
$funcionario3 = new Funcionarios("Vegeta",   "m", 30, 4000, $conn);
$funcionario4 = new Funcionarios("Hermione", "f", 35, 5000, $conn);

$funcionario1->criar();
$funcionario2->criar();
$funcionario3->criar();
$funcionario4->criar();

echo "<br>";

$funcionario1->mudarNome("Messi");
$funcionario2->mudarNome("Lulu");
$funcionario3->mudarNome("Ronaldinho");
$funcionario4->mudarNome("Velma");

echo "<br>";

$funcionario1->darAumento("200%");
$funcionario2->darAumento("50%");
$funcionario3->darAumento("20%");
$funcionario4->darAumento("60%");

echo "<br>";

Funcionarios::listarTodos($conn);

echo "<br>";

$funcionario3Id = $funcionario3->getId();
unset($funcionario3);
$funcionario3   = Funcionarios::puxarDados($funcionario3Id, $conn);


echo "<pre>";
var_dump($funcionario3);
echo "</pre>";

Funcionarios::deletarFuncionario($conn,$funcionario2->getId());
//Funcionarios::deletarTodos($conn);
Funcionarios::listarTodos($conn);
$conexao->desconectar();



