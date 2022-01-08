<?php 

// map a route namespace is autoloaded

$router->map('GET', '/','Iontas\Commerce\Controllers\indexController::index');

//For single item i need to invoke a id on the item

$router->map('GET', '/single-item','Iontas\Commerce\Controllers\singleItemController::index');

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);

