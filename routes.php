<?php 

// map a route namespace is autoloaded

$router->map('GET', '/','Iontas\Commerce\Controllers\indexController::index');

//For single item i need to invoke a id on the item

$router->map('GET', '/single-item','Iontas\Commerce\Controllers\singleItemController::index');

// Sign-In Route

$router->map('GET', '/sign-in','Iontas\Commerce\Controllers\signInController::index');

// Sign-Up Route

$router->map('GET', '/sign-up','Iontas\Commerce\Controllers\signUpController::index');


/**
 * Create Admin Routes as a Group
 */

$router->group('/admin', function (\League\Route\RouteGroup $route) {
    $route->map('GET', '/', 'AcmeController::actionOne');
    $route->map('GET', '/edit', 'AcmeController::actionTwo');
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

