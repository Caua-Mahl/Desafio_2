<?php

class Funcionarios
{
    private string $id;
    private string $nome;
    private string $genero;
    private string $idade;
    private int    $salario;

    public function __construct(string $nome, string $genero, int $idade, int $salario)
    {
        $this->nome    = $nome;
        $this->genero  = $genero;
        $this->idade   = $idade;
        $this->salario = $salario;
    }

    //CRUD

    public function criar($conexao): void
    {
        $sql       = "INSERT INTO funcionarios (nome, genero, idade, salario) VALUES ('$this->nome', '$this->genero', '$this->idade', '$this->salario')";
        $resultado = pg_query($conexao, $sql);
        if ($resultado === false) {
            die("Error: " . pg_last_error());
        }
        echo "Funcionario criado com sucesso";
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
