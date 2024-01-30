<?php 
 'Produto.php';
class LeitorCsv {
    public array $produtos = [];

    public function __construct($produtosCsv ){
        $linhas = [];
        while (($dados = fgetcsv($produtosCsv, 1000, ",")) !== FALSE) {
            $linhas[] = $dados;
            echo "<pre>"; // para melhorar a visualização
        }
        array_shift($linhas); // tirar o cabeçalho
        //var_dump($linhas);
        foreach ($linhas as $linha) {
            $this->produtos[]=new Produto($linha[0], $linha[1], $linha[2]);
        }
    }
    public function getProdutos(){
        return $this->produtos;
    }
}

?>