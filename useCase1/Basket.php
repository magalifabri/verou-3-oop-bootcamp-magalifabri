<?php

include_once './phpSettings.php';

class Basket
{
    public array $items;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function price(): float
    {
        $price = 0;

        foreach ($this->items as $item) {
            $price += $item->price;
        }

        return $price;
    }

    public function taxAmount(): float
    {
        $taxAmount = 0;

        foreach ($this->items as $item) {
            $taxAmount += $item->price * $item->taxRate;
        }

        return $taxAmount;
    }
}
