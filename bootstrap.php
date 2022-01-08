<?php 

/**
 * Introduce Typing
 */
declare(strict_types=1);

/**
 * Require autoload to autoload classes
 */
require __DIR__.'/vendor/autoload.php';

/**
 * Bootstraping Classes by Adding Namespaces and Directories
 * in the composer PSr4 section
 */

 /**
  * Use Container for Dependency Injection with blade templating and strategy
  */
use League\Route\Strategy\ApplicationStrategy;

use Jenssegers\Blade\Blade;

// Routing
use Laminas\Diactoros\ServerRequestFactory;

use League\Route\Router;

/** 
 * Set blade views dir and cache dir
 */

 $blade = new Blade('views','cache');

/**
 * Set container dependency injection
 */

$container = new League\Container\Container;

$container->add(Iontas\Commerce\Controllers\indexController::class)->addArgument($blade);
$container->add(Iontas\Commerce\Controllers\singleItemController::class)->addArgument($blade);

$strategy = (new ApplicationStrategy)->setContainer($container);
 
/**
  * Set a route variable
  */

$router = (new Router)->setStrategy($strategy);

$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

/**Bootstraping application routes */

require_once __DIR__.'/routes.php';