<?php
require "Funcionarios.php";
//  jdbc:postgresql://localhost:5432/postgres
/*Warning: pg_connect(): Unable to connect to PostgreSQL server: could not connect to server: Connection refused Is the server running on host "localhost" (127.0.0.1) and accepting TCP/IP connections on port 5432? could not connect to server: Cannot assign requested address Is the server running on host "localhost" (::1) and accepting TCP/IP connections on port 5432? in /var/www/html/index.php on line 12 */


$server = "localhost";
$user   = "postgres";
$pass   = "exemplo";
$port   = "5432";

$infos_string = "host=$server port=$port dbname=postgres user=$user password=$pass";

$conn = pg_connect($infos_string) or die("Nao foi possivel conectar ao Banco de Dados");
echo "Conecçao bem sucedida";

pg_close($conn) or die("Nao foi possivel desconectar ao Banco de Dados");
echo "Desconecçao bem sucedida";
