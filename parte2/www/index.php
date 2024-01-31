<?php
require "Funcionarios.php";

$db   = "postgres";
$pass   = "exemplo";
$port   = "5432";

$infos_string = "host=$db port=$port dbname=$db user=$db password=$pass";

$conn = pg_connect($infos_string) or die("Nao foi possivel conectar ao Banco de Dados");
echo "Conecção bem sucedida";

pg_close($conn) or die("Nao foi possivel desconectar ao Banco de Dados");
echo "Desconecção bem sucedida";

