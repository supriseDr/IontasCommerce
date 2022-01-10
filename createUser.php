<?php
// use database seeders

use Iontas\Commerce\Models\User;

require_once "bootstrap.php";


$user = new User();
$user->setEmail($faker->email);
$user->setUsername($faker->name);
$user->setPassword('password');
$user->setAccessLevel(1);
$user->setCreatedAt();
$user->setUpdatedAt();


$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID " . $user->getId() . "\n";
echo "Created User with mail " . $user->getEmail() . "\n";
echo "Created User with name " . $user->getUsername() . "\n";
echo "Created  User with password" . $user->getPassword() . "\n";
