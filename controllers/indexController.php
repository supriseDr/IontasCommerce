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

//Use Entity Manager to Query Repositories
use Doctrine\ORM\EntityManager;

//Authentication Library

use Jasny\Auth\Auth;

class indexController
{
    /**
     *blade constructor 
     */
    protected $blade;

    /**
     * entity manager constructor
     */
    protected $entityManager;

    /**
     * Products Repository
     */

    protected $productRepository;

     /**
     * Authentication
     */

    protected $auth;

    /**
     * Constructor for Dependency Injection
     */
    public function __construct(Blade $blade,EntityManager $entityManager, Auth $auth)
    {
        $this->blade = $blade;

        $this->entityManager = $entityManager;

        $this->productRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\Product');

        $this->auth = $auth;

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
        /**Store Products in Array and Pass them to the front */

        //$products = $this->productRepository->findAll();
       $products = $this->productRepository->findBy(['active' => 1]);

        //$products = [];

        // ...
        $response = new Response;
        $response->getBody()->write($this->blade->make('homepage',['foo'=>'bar','products'=>$products,'auth'=>$this->auth])->render());
        return $response;

    }

}