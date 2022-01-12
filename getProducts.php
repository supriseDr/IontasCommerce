<?php 

require_once "bootstrap.php";

$id = 1;
$products = $entityManager->getRepository('Iontas\Commerce\Models\Product')->findAll();

if ($products === null) {
    echo "No product found.\n";
    exit(1);
}

foreach ($products as $product) {
   
   var_dump($product->getCategories());
  
}