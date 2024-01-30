<?php 
class Produto {
    private string $product_id;
    private string $name;
    private string $price;

    public function __construct(string $product_id, string $name, string $price) {
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
