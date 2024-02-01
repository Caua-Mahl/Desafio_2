<?php
class LeitorProdutos
{
    private array $produtos = [];

    public function __construct($produtosCsv){
        $linhas = [];
        while (($dados = fgetcsv($produtosCsv, 1000, ",")) !== FALSE) {
            $linhas[]  = $dados;
        }
        array_shift($linhas);
        foreach ($linhas as $linha) {
            $this->produtos[] = new Produto($linha[0], $linha[1], $linha[2]);
        }
    }
    public function getProdutos(){
        return $this->produtos;
    }
}
