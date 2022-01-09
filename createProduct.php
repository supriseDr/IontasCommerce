<?php
// use database seeders

use Iontas\Commerce\Models\Product;

require_once "bootstrap.php";

/*
$seeder->table('products')->columns([
    'id', //automatic pk
    'name'=>$faker->name,
    'url'=>$faker->imageUrl($width,$height,'clothes'),
    'price'=>function(){
        return rand(10,100);
    },
    'active'=>$faker->boolean(),
    'description'=>$faker->text(30),
    'shortdescription'=>$faker->text(20)
])->rowQuantity(30);

$seeder->refill();
*/


$product = new Product();
$product->setName($faker->name);
$product->setImageUrl($faker->url);
$product->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL));
$product->setActive($faker->boolean);
$product->setDescription($faker->text(120));
$product->setShortDescription($faker->text(30));
$product->setCreatedAt();
$product->setUpdatedAt();


$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
