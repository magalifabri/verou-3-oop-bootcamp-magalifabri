<?php

class FoodItem
{
    public string $name;
    public float $price;
    public float $taxRate;

    public function __construct(
        string $name,
        float $price,
        float $taxRate
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->taxRate = $taxRate;
    }
}
