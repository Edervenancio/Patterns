<?php 

namespace Source\Model; 

class Inventory
{

    private $id;
    private $productName;
    private $descriptions;
    private $price;
    private $quantity; 

    protected $fillable = [$productName, $descriptions, $price, $quantity];
    
    public function __construct($id, $productName, $descriptions, $price, $quantity)
    {
        $this->id = $id;
        $this->productName = $productName;
        $this->descriptions = $descriptions;
        $this->price = $price;
        $this->quantity = $quantity;
    }


}