<?php 
/**
 * Require autoload to autoload classes
 */
require __DIR__.'/vendor/autoload.php';

/**
 * Bootstraping Classes
 */

use Jenssegers\Blade\Blade;


/** 
 * Set blade views dir and cache dir
 */

 $blade = new Blade('views','cache');