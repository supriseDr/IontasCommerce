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

// Doctrine Relational Object Models
use Doctrine\ORM\Tools\Setup;

use Doctrine\ORM\EntityManager;

// Set Up Jasny for Auth
use Jasny\Auth\Auth;

use Jasny\Auth\Authz\Levels;

/**Configure Doctrine ORM */
$isDevMode = true;

$proxyDir = null;

$cache = null;

$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/models"), $isDevMode,$proxyDir, $cache, $useSimpleAnnotationReader);

//connect to sqlite for now

$conn = array(
  'driver' => 'pdo_sqlite',
  'path' => __DIR__ . '/database/db.sqlite',
);

// obtaining the entity manager and use it on dependency injection

$entityManager = EntityManager::create($conn, $config);

/** 
 * Set blade views dir and cache dir
 */

 $blade = new Blade('views','cache');

/**
 * Set container dependency injection
 */

$container = new League\Container\Container;

$container->add(Iontas\Commerce\Controllers\indexController::class)->addArgument($blade)->addArgument($entityManager);
$container->add(Iontas\Commerce\Controllers\singleItemController::class)->addArgument($blade)->addArgument($entityManager);
$container->add(Iontas\Commerce\Controllers\signInController::class)->addArgument($blade)->addArgument($entityManager);
$container->add(Iontas\Commerce\Controllers\signUpController::class)->addArgument($blade)->addArgument($entityManager);

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

/**
 * Require faker
 */
$faker = Faker\Factory::create();