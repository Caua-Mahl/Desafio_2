<?php 
class Produto {
    private array $produtos=[];
    private string $product_id;
    private string $name;
    private string $price;

    public function __construct($produtosCsv ){
        $linhas = [];
        while (($dados = fgetcsv($produtosCsv, 1000, ",")) !== FALSE) {
            $linhas[] = $dados;
            echo "<pre>"; // para melhorar a visualização
        }
        array_shift($linhas); // tirar o cabeçalho
        var_dump($linhas);
        foreach ($linhas as $linha) {
            $this->produtos[$linha]=$this->criaProduto($linha[0], $linha[1], $linha[2]);
        }
        echo "<pre>"; // para melhorar a visualização
        var_dump($this->produtos);
    }

    public function criaProduto(string $product_id, string $name, string $price) {
        $this->product_id = $product_id;
        $this->name       = $name;
        $this->price      = $price;
        echo "$name criado! <br>";   
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setProduct_id(string $product_id) {
        $this->product_id = $product_id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setPrice(string $price) {
        $this->price = $price;
    }
}
