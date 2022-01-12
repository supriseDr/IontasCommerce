<?php 

require_once "bootstrap.php";

$id = 1;
$categories = $entityManager->getRepository('Iontas\Commerce\Models\Category')->findAll();

if ($categories === null) {
    echo "No product found.\n";
    exit(1);
}

foreach ($categories as $category) {
   
   var_dump($category->getProducts()->getName());
  
}