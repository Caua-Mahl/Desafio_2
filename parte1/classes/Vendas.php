<?php 
class Vendas {
    private string $order_id;
    private string $product_id;
    private string $date;
    private int $quantity;

    public function __construct(string $order_id, string $product_id, string $date, int $quantity) {
        $this->order_id   = $order_id;
        $this->product_id = $product_id;
        $this->date       = $date;
        $this->quantity   = $quantity;
        // echo "Venda criada! <br>";   
    }
}