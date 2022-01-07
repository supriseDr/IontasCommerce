<?php 

/**
 * index entry file uses blade templating
 */

require_once __DIR__.'/bootstrap.php';

echo $blade->make('homepage',['foo'=>'bar'])->render();