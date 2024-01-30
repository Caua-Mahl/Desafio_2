<?php
class LeitorVendas
{
    private array $vendas = [];

    public function __construct($vendascsv)
    {
        $linhas = [];
        while (($dados = fgetcsv($vendascsv, 1000, ",")) !== FALSE) {
            $linhas[]  = $dados;
        }
        array_shift($linhas); // tirar o cabeçalho
        foreach ($linhas as $linha) {
            $this->vendas[] = new Venda($linha[0], $linha[1], $linha[2], $linha[3]);
        }
    }

    public function getVendas(){
        return $this->vendas;
    }


}
