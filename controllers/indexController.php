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
     * Constructor for Dependency Injection
     */
    public function __construct(Blade $blade,EntityManager $entityManager)
    {
        $this->blade = $blade;

        $this->entityManager = $entityManager;

        $this->productRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\Product');

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

        // ...
        $response = new Response;
        $response->getBody()->write($this->blade->make('homepage',['foo'=>'bar','products'=>$products])->render());
        return $response;

    }

}