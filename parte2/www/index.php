<?php
require "Funcionarios.php";
//  jdbc:postgresql://localhost:5432/postgres

$server = "localhost";
$user   = "postgres";
$pass   = "exemplo";
$port   = "8101";

$infos_string = "host=$server port=$port dbname=postgres user=$user password=$pass";

$conn = pg_connect($infos_string) or die("Nao foi possivel conectar ao Banco de Dados");
echo "Conecçao bem sucedida";

pg_close($conn) or die("Nao foi possivel desconectar ao Banco de Dados");
echo "Desconecçao bem sucedida";

