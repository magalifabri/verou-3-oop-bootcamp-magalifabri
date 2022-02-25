<?php

include_once './phpSettings.php';

class FoodItem
{
    public string $name;
    public float $price;
    public float $taxRate;

    public function __construct($name, $price, $taxRate)
    {
        $this->name = $name;
        $this->price = $price;
        $this->taxRate = $taxRate;
    }
}
