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

    public function listarFuncionarios(): array{

    }
    public function listarFuncionario($id): array{

    }
}
