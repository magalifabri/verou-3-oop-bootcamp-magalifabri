<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*
A basket contains the following things:

Banana's (6 pieces, costing €1 each)
Apples (3 pieces, costing €1.5 each)
Bottles of wine (2 bottles, costing €10 each)
Without using classes, do the following in your code:

Calculate the total price
Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)
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

function calcTotalTax($basket)
{
    $totalTax = 0;

    foreach ($basket as $item => $itemInfo) {
        $totalPrice = $itemInfo['price'] * $itemInfo['number'];

        switch ($item) {
            case 'banana':
            case 'apple':
                $totalTax += $totalPrice * .06;
                break;

            case 'wine':
                $totalTax += $totalPrice * .21;
                break;

            default:
                break;
        }
    }

    return $totalTax;
}

function calcTotalPrice($basket)
{
    $totalPrice = 0;

    foreach ($basket as $itemInfo) {
        $totalPrice += $itemInfo['price'] * $itemInfo['number'];
    }

    return $totalPrice;
}

echo 'Without classes: <br>';
echo 'total price: ' . calcTotalPrice($basket);
echo '<br>';
echo 'total tax: ' . calcTotalTax($basket);
echo '<br><br>';


/*
Next, do the same with classes. What style do you prefer? Do you notice any difference in time needed to code, structure or readability? From now on, if nothing is stated specifically, it's recommended to use classes.
*/

class FoodItem
{
    public string $name;
    public float $price;
    public float $tax;
    public int $number;

    public function __construct($name, $price, $tax, $number)
    {
        $this->name = $name;
        $this->price = $price;
        $this->tax = $tax;
        $this->number = $number;
    }

    public function calcTotalPrice()
    {
        return $this->price * $this->number;
    }

    public function calcTotalTax()
    {
        return $this->calcTotalPrice() * $this->tax;
    }
}

$bananas = new FoodItem('banana', 1, .06, 6);
$apples = new FoodItem('apple', 1.5, .06, 3);
$wine = new FoodItem('wine', 10, .21, 2);

echo 'With classes:<br>';
echo 'total price: ';
echo $bananas->calcTotalPrice() + $apples->calcTotalPrice() + $wine->calcTotalPrice();
echo '<br>';
echo 'total tax: ';
echo $bananas->calcTotalTax() + $apples->calcTotalTax() + $wine->calcTotalTax();
