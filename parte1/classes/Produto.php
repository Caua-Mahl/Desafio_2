<?php
class Produto
{
    private string $productID;
    private string $name;
    private string $price;

    public function __construct(string $productID, string $name, string $price)
    {
        $this->productID = $productID;
        $this->name       = $name;
        $this->price      = $price;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setProductID(string $productID)
    {
        $this->productID = $productID;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPrice(string $price)
    {
        $this->price = $price;
    }
}
