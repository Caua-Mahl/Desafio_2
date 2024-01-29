<?php 

$server = "postgres";
$user   = "postgres";
$pass   = "exemplo";
$port   = "5432";

$infos_string = "host=$server port=$port dbname=postgres user=$user password=$pass";

$conn = pg_connect($infos_string) or die("Nao foi possivel conectar ao Banco de Dados");
echo "Conecçao bem sucedida";

pg_close($conn) or die("Nao foi possivel desconectar ao Banco de Dados");
echo "Desconecçao bem sucedida";

/*
    CREATE TABLE public.funcionarios (
        id serial4  NOT NULL,
        nome varchar(100) NULL,
        genero varchar(10) NULL,
        idade int4 NULL,
        salario numeric(10,2) NULL,
        CONSTRAINT funcionarios_pkey PRIMARY KEY (id)
    );

*/