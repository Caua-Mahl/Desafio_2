<?php 
 class Conexao {
    private string $host;
    private string $port;
    private string $dbname;
    private string $user;
    private string $password;
    private string $infos_string;
    private $conn;

    public function __construct(string $host, string $port, string $dbname, string $user, string $password)
    {
        $this->host         = $host;
        $this->port         = $port;
        $this->dbname       = $dbname;
        $this->user         = $user;
        $this->password     = $password;
        $this->infos_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
    }

    public function conectar(): void
    {
        $this->conn = pg_connect($this->infos_string) or die("Nao foi possivel conectar ao Banco de Dados");
        echo "Conecção bem sucedida";
    }

    public function desconectar(): void
    {
        pg_close($this->conn) or die("Nao foi possivel desconectar ao Banco de Dados");
        echo "Desconecção bem sucedida";
    }
 }

 
 