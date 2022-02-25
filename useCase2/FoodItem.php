<?php

class FoodItem
{
    public string $name;
    public float $price;
    public float $taxRate;
    public string $category;
    public float $discount;

    public function __construct(
        string $name,
        float $price,
        float $taxRate,
        string $category,
        float $discount = 0
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->taxRate = $taxRate;
        $this->category = $category;
        $this->discount = $discount;
    }
}
