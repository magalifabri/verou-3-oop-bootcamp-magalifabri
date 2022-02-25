<?php

include_once './phpSettings.php';
require_once './FoodItem.php';
require_once './Basket.php';

/*
A basket contains the following things:

Banana's (6 pieces, costing €1 each)
Apples (3 pieces, costing €1.5 each)
Bottles of wine (2 bottles, costing €10 each)
Without using classes, do the following in your code:

Calculate the total price
Calculate how much of the total price is tax (fruit goes at 6%, wine is 21%)

Next, do the same with classes. What style do you prefer? Do you notice any difference in time needed to code, structure or readability? From now on, if nothing is stated specifically, it's recommended to use classes.
*/


function pre_r($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}


// create basket with items

$basket = new Basket([
    new FoodItem("banana", 1, .06),
    new FoodItem("banana", 1, .06),
    new FoodItem("banana", 1, .06),
    new FoodItem("banana", 1, .06),
    new FoodItem("banana", 1, .06),
    new FoodItem("banana", 1, .06),
    new FoodItem("apple", 1.5, .06),
    new FoodItem("apple", 1.5, .06),
    new FoodItem("apple", 1.5, .06),
    new FoodItem("wine", 10, .21),
    new FoodItem("wine", 10, .21),
]);

// pre_r($basket);

echo 'price: ' . $basket->price() . '<br>';
echo 'taxAmount: ' . $basket->taxAmount() . '<br>';
