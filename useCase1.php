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

echo calcTotalPrice($basket);
echo '<br>';
echo calcTotalTax($basket);
