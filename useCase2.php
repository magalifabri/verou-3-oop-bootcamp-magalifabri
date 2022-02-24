<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*
Consider the same basket as in use case 1. The shop owner wants to have a way to have 50% off every fruit. Can you find a way to implement the discount once, and re-use it efficiently for every fruit?
*/


// DEV FUNCTIONS

function pre_r($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}


// FUNCTIONS

$basket = [
    'banana' => [
        'number' => 6,
        'price' => 1,
    ],
    'apple' => [
        'number' => 3,
        'price' => 1.5,
    ],
    'wine' => [
        'number' => 2,
        'price' => 10,
    ],
];

pre_r($basket);

class FoodItem
{
    public string $name;
    public float $price;
    public float $tax;
    public int $number;
    public float $discount;

    public function __construct(
        string $name,
        float $price,
        float $tax,
        int $number,
        float $discount = 0
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->tax = $tax;
        $this->number = $number;
        $this->discount = $discount;
    }

    public function calcTotalPrice()
    {
        return ($this->price * $this->number) * ((100 - $this->discount) / 100);
    }

    public function calcTotalTax()
    {
        return $this->calcTotalPrice() * $this->tax;
    }

    public function setDiscount(float $discountPercentage, array $items)
    {
        if (in_array($this->name, $items)) {
            $this->discount = $discountPercentage;
        }
    }
}

class Basket
{
    public array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addItem($item)
    {
        $this->items[$item->name] = $item;
    }

    public function setDiscountOnItems(array $items, float $discountPercentage)
    {
        foreach ($this->items as $item) {
            if (in_array($item->name, $items)) {
                $item->discount = $discountPercentage;
            }
        }
    }
}

$basket = new Basket();
$basket->addItem(new FoodItem('banana', 1, .06, 6));
$basket->addItem(new FoodItem('apple', 1.5, .06, 3));
$basket->addItem(new FoodItem('wine', 10, .21, 2));

echo 'total price: ';
echo $basket->items['banana']->calcTotalPrice() + $basket->items['apple']->calcTotalPrice() + $basket->items['wine']->calcTotalPrice();
echo '<br>';
echo 'total tax: ';
echo $basket->items['banana']->calcTotalTax() + $basket->items['apple']->calcTotalTax() + $basket->items['wine']->calcTotalTax();
echo '<br>';

echo 'add 50% discount to fruit <br>';
$basket->setDiscountOnItems(['banana', 'apple'], 50);

echo 'total price: ';
echo $basket->items['banana']->calcTotalPrice() + $basket->items['apple']->calcTotalPrice() + $basket->items['wine']->calcTotalPrice();
echo '<br>';
echo 'total tax: ';
echo $basket->items['banana']->calcTotalTax() + $basket->items['apple']->calcTotalTax() + $basket->items['wine']->calcTotalTax();
echo '<br>';
