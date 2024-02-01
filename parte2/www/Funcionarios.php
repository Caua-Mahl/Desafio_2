<?php

class Funcionarios
{
    private int    $id;
    private string $nome;
    private string $genero;
    private string $idade;
    private int    $salario;

    public function criar(string $nome="", string $genero="", int $idade=0, int $salario=0, $conexao): void {
        $this->nome     = $nome;
        $this->genero   = $genero;
        $this->idade    = $idade;
        $this->salario  = $salario;
        $this->$conexao = $conexao;
        $sql       = "INSERT INTO funcionarios (nome, genero, idade, salario) 
                      VALUES ('$this->nome', '$this->genero', '$this->idade', '$this->salario')";
        $resultado = pg_query($conexao, $sql); 
        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }
        echo "$this->nome foi adicionado(a) <br>";
         $this->ultimoIdInserido($conexao);
    }

    public static function listarTodos($conexao): void {
        $sql       = "SELECT * FROM funcionarios";
        $resultado = pg_query($conexao, $sql);

        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }
        echo "Lista de todos:<br>";
        while ($funcionario = pg_fetch_assoc($resultado)) {
            echo "- id: "      . $funcionario["id"]      . "
                  - Nome: "    . $funcionario["nome"]    . "
                  - Genero: "  . $funcionario["genero"]  . "
                  - Idade: "   . $funcionario["idade"]   . "
                  - Salario: " . $funcionario["salario"] . "<br> <br>";
        }
    }

    public static function listarFuncionario($conexao, $id): void {
        $sql       = "SELECT * FROM funcionarios WHERE id = '$id'";
        $resultado = pg_query($conexao, $sql);
        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }

        $funcionario = pg_fetch_assoc($resultado);
        echo "Você buscou pelo $id e obteve a seguinte resposta: <br>
        - id: "        . $funcionario["id"]      . " 
        - Nome: "      . $funcionario["nome"]    . " 
        - Genero: "    . $funcionario["genero"]  . " 
        - Idade: "     . $funcionario["idade"]   . " 
        - Salario: R$" . $funcionario["salario"] . "<br>";
    }

    public function puxarDados($conexao): void {
        $sql       = "SELECT * FROM funcionarios WHERE id = '$this->id'";
        $resultado = pg_query($conexao, $sql);

        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }

        $funcionario = pg_fetch_assoc($resultado);
        $this->nome    = $funcionario["nome"];
        $this->genero  = $funcionario["genero"];
        $this->idade   = $funcionario["idade"];
        $this->salario = $funcionario["salario"];
    }

    private function ultimoIdInserido($conexao): void {
        $sql       = "SELECT CURRVAL('funcionarios_id_seq')";
        $resultado = pg_query($conexao, $sql);
        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }
        $ultimoId = pg_fetch_array($resultado);
        $this->id = $ultimoId["currval"];
    }

    public function mudarNome($novoNome, $conexao): void {
        $sql       = "UPDATE funcionarios SET nome = '$novoNome' WHERE id = '$this->id'";
        $this->nome = $novoNome;
        $resultado = pg_query($conexao, $sql);
        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }
        echo "O funcionario $this->id teve seu nome alterado para $this->nome <br><br>";
    }

    public function darAumento($aumento, $conexao): void {
        $aumento        = intval(rtrim($aumento, '%')); // vou receber uma porcentagem, vou cortar o % e transformar em int
        $this->salario  = $this->salario + ($this->salario * ($aumento / 100)); 
        $sql            = "UPDATE funcionarios SET salario ='$this->salario' WHERE id = '$this->id'";
        $resultado      = pg_query($conexao, $sql);

        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }

        echo "$this->nome recebeu um aumento, agora seu salario é de R\$" . $this->salario .",00  <br><br>";
    }

    public static function deletarTodos($conexao): void {
        $sql       = "DELETE FROM funcionarios";
        $resultado = pg_query($conexao, $sql);

        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }

        echo "Todos os funcionarios foram deletados <br><br>";
    }

    public static function deletarFuncionario($conexao, $id): void {
        $sql       = "DELETE FROM funcionarios WHERE id = '$id'";
        $resultado = pg_query($conexao, $sql);

        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }

        echo "O funcionario $id foi deletado <br><br>";
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getGenero(): string
    {
        return $this->genero;
    }
    public function getidade(): int
    {
        return $this->idade;
    }
    public function getSalario(): int
    {
        return $this->salario;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    public function setGenero(string $genero): void
    {
        $this->genero = $genero;
    }
    public function setidade(int $idade): void
    {
        $this->idade = $idade;
    }
    public function setSalario(int $salario): void
    {
        $this->salario = $salario;
    }
}
