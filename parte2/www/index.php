<?php
require "Funcionarios.php";
require "Conexao.php";

$pg = "postgres";
$conexao= new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();
/*$funcionario1 = new Funcionarios("Naruto", "m", 22, 2000,$conexao->getConn());
$funcionario2 = new Funcionarios("Vayne", "f", 25, 3000,$conexao->getConn());
$funcionario3 = new Funcionarios("Vegeta", "m", 30, 4000,$conexao->getConn());
$funcionario4 = new Funcionarios("Hermione", "f", 35, 5000, $conexao->getConn()); */

echo "<br>";

$funcionario1 = new Funcionarios();
$funcionario2 = new Funcionarios();
$funcionario3 = new Funcionarios();
$funcionario4 = new Funcionarios();

$funcionario1->criar("Naruto", "m", 22, 2000,$conexao->getConn());
$funcionario2->criar("Vayne", "f", 25, 3000,$conexao->getConn());
$funcionario3->criar("Vegeta", "m", 30, 4000,$conexao->getConn());
$funcionario4->criar("Hermione", "f", 35, 5000, $conexao->getConn());

echo "<br>";

$funcionario1->mudarNome("Messi",$conexao->getConn());
$funcionario2->mudarNome("Lulu",$conexao->getConn());
$funcionario3->mudarNome("Ronaldinho",$conexao->getConn());
$funcionario4->mudarNome("Daenerys",$conexao->getConn());

echo "<br>";

Funcionarios::listarTodos($conexao->getConn());

echo "<br>";

$funcionario1->darAumento("200%", $conexao->getConn());
$funcionario2->darAumento("50%", $conexao->getConn());
$funcionario3->darAumento("20%", $conexao->getConn());
$funcionario4->darAumento("60%", $conexao->getConn());

echo "<br>";

Funcionarios::listarTodos($conexao->getConn());

echo "<br>";
echo "<pre>";

var_dump($funcionario3);
$funcionario3Id = $funcionario3->getId();
echo "<br>";

unset($funcionario3);

echo "<br>";
$funcionario3= new Funcionarios();
var_dump($funcionario3);
echo "<br>";
$funcionario3->setId($funcionario3Id);
$funcionario3->puxarDados($conexao->getConn());
var_dump($funcionario3);
echo "</pre>";

echo "<br>";


Funcionarios::deletarTodos($conexao->getConn());

echo "<br>";

Funcionarios::listarTodos($conexao->getConn());

/*
echo "<br>";
Funcionarios::listarTodos($conexao->getConn());
echo "<br>";
Funcionarios::listarFuncionario($conexao->getConn(), $funcionario2->getId());
echo "<br>";
Funcionarios::deletarFuncionario($conexao->getConn(), $funcionario2->getId());
echo "<br>";
Funcionarios::listarFuncionario($conexao->getConn(), $funcionario2->getId());
echo "<br>";
Funcionarios::listarTodos($conexao->getConn());
echo "<br>";
Funcionarios::deletarTodos($conexao->getConn());*/

$conexao->desconectar();



