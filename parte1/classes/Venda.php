<?php
class Venda
{
    private string $orderID;
    private string $productID;
    private string $date;
    private int $quantity;

    public function __construct(string $orderID, string $productID, string $date, int $quantity)
    {
        $this->orderID   = $orderID;
        $this->productID = $productID;
        $this->date       = $date;
        $this->quantity   = $quantity;
    }

    public function getOrderID(): string
    {
        return $this->orderID;
    }

    public function getProductID(): string
    {
        return $this->productID;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setOrderID(string $orderID)
    {
        $this->orderID = $orderID;
    }

    public function setProductID(string $productID)
    {
        $this->productID = $productID;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}
