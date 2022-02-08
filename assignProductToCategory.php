<?php 

//use Iontas\Commerce\Models\Product;

//use Iontas\Commerce\Models\Category;

require_once "bootstrap.php";

/**
 * Find Product By Id First
 */
$id = 1 ;

$product = $entityManager->find("Iontas\Commerce\Models\Product", $id);

$category = $entityManager->find("Iontas\Commerce\Models\Category", 1);

$product->assignToCategory($category);

$entityManager->persist($category);
$entityManager->flush();

foreach ($category->getProducts() as $product) {
    echo "    Platform: ".$product->getName()."\n";
}