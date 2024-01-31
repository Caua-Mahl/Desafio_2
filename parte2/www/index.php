<?php
require "Funcionarios.php";
require "Conexao.php";

$pg = "postgres";
$conexao= new Conexao($pg, "5432", $pg, $pg, "exemplo");
$conexao->conectar();
$funcionario1 = new Funcionarios("Joao", "m", 22, 2000);
$funcionario2 = new Funcionarios("Maria", "f", 25, 3000);
$funcionario3 = new Funcionarios("Jose", "m", 30, 4000);
$funcionario4 = new Funcionarios("Ana", "f", 35, 5000);

$funcionario1->criar($conexao->getConn());
$funcionario2->criar($conexao->getConn());
//$funcionario3->criar($conexao->getConn());
//$funcionario4->criar($conexao->getConn());

Funcionarios::listarTodos($conexao->getConn());
echo "<br>";
Funcionarios::listarFuncionario($conexao->getConn(), $funcionario1->getId());
echo "<br>";
Funcionarios::deletarFuncionario($conexao->getConn(), $funcionario1->getId());
echo "<br>";
Funcionarios::listarFuncionario($conexao->getConn(), $funcionario1->getId());
echo "<br>";
Funcionarios::deletarTodos($conexao->getConn());
//Funcionarios::listarTodos($conexao->getConn());



$conexao->desconectar();



