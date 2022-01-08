<?php 

declare(strict_types=1);

//Namespace
namespace Iontas\Commerce\Controllers;

//Routing Interfaces
use Psr\Http\Message\ResponseInterface;

use Psr\Http\Message\ServerRequestInterface;

use Laminas\Diactoros\Response;

//Blade templating
use Jenssegers\Blade\Blade;

class indexController
{
    /**
     *blade constructor 
     */
    protected $blade;

    /**
     * Constructor for Dependency Injection
     */
    public function __construct(Blade $blade)
    {
        $this->blade = $blade;
    }

    /**
     * Controller.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        // ...
        $response = new Response;
        $response->getBody()->write($this->blade->make('homepage',['foo'=>'bar'])->render());
        return $response;

    }

}