<?php
require "Funcionarios.php";
require "Conexao.php";

$pg = "postgres";
$conexao= new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();
$funcionario1 = new Funcionarios("Naruto", "m", 22, 2000,$conexao->getConn());
$funcionario2 = new Funcionarios("Vayne", "f", 25, 3000,$conexao->getConn());
$funcionario3 = new Funcionarios("Vegeta", "m", 30, 4000,$conexao->getConn());
$funcionario4 = new Funcionarios("Hermione", "f", 35, 5000, $conexao->getConn());

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



