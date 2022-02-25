<?php

include_once '../phpSettings.php';
require_once './FoodItem.php';
require_once './Basket.php';

/*
Consider the same basket as in use case 1. The shop owner wants to have a way to have 50% off every fruit. Can you find a way to implement the discount once, and re-use it efficiently for every fruit?
*/

$basket = new Basket([
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("banana", 1, .06, 'fruit'),
    new FoodItem("apple", 1.5, .06, 'fruit'),
    new FoodItem("apple", 1.5, .06, 'fruit'),
    new FoodItem("apple", 1.5, .06, 'fruit'),
    new FoodItem("wine", 10, .21, 'alcoholicDrink'),
    new FoodItem("wine", 10, .21, 'alcoholicDrink'),
]);


echo 'price: ' . $basket->price() . '<br>';
echo 'taxAmount: ' . $basket->taxAmount() . '<br>';

echo '<br>';
echo '+ 50% discount on fruit <br>';
$basket->setDiscount(['fruit', 'alcoholicDrink'], .5);

echo 'price: ' . $basket->price() . '<br>';
echo 'taxAmount: ' . $basket->taxAmount() . '<br>';

echo '<br>';
echo '+ 25% discount on alcoholic drinks <br>';
$basket->setDiscount(['alcoholicDrink'], .25);

echo 'price: ' . $basket->price() . '<br>';
echo 'taxAmount: ' . $basket->taxAmount() . '<br>';
