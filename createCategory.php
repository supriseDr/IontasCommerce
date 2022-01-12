<?php 

/**
 * 
 */

use Iontas\Commerce\Models\Category;

require_once "bootstrap.php";

$category = new Category();
$category->setName($faker->name());
$category->setActive($faker->boolean());
$category->setSlug($faker->slug($nbWords = 2, $variableNbWords = true));
$category->setCover($faker->text(10));
$category->setParentId(1);
$category->setDescription($faker->text(50));
$category->setCreatedAt();
$category->setUpdatedAt();


$entityManager->persist($category);
$entityManager->flush();

echo "Created Category with ID " . $category->getId() . "\n";
