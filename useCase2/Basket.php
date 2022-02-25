<?php

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
            $price += $item->price - ($item->price * $item->discount);
        }

        return $price;
    }

    public function taxAmount(): float
    {
        $taxAmount = 0;

        foreach ($this->items as $item) {
            $taxAmount += ($item->price - ($item->price * $item->discount)) * $item->taxRate;
        }

        return $taxAmount;
    }

    public function setDiscount(
        array $productCategories,
        float $discountPercentage
    ) {
        foreach ($this->items as $item) {
            if (in_array($item->category, $productCategories)) {
                $item->discount = $discountPercentage;
            }
        }
    }
}
