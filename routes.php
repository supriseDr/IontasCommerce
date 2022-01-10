<?php 

// map a route namespace is autoloaded

$router->map('GET', '/','Iontas\Commerce\Controllers\indexController::index');

//For single item i need to invoke a id on the item

$router->map('GET', '/single-item','Iontas\Commerce\Controllers\singleItemController::index');

// Sign-In Route

$router->map('GET', '/sign-in','Iontas\Commerce\Controllers\signInController::index');

// Sign-Up Route

$router->map('GET', '/sign-up','Iontas\Commerce\Controllers\signUpController::index');


/*

-- Router doesn't allow definition of route
$router->map('GET', '/admin-', function(){

});
*/

/**
 * Create Admin Routes as a Group
 */

$router->group('/io-admin', function (\League\Route\RouteGroup $route) {
    $route->map('GET', '/', 'Iontas\Commerce\Admin\Controllers\indexController::index');
    //$route->map('GET', '/edit', 'AcmeController::actionTwo');
});


$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

