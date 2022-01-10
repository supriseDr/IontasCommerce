<?php 

declare(strict_types=1);

//Namespace
namespace Iontas\Commerce\Admin\Controllers;

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
     * Users Repository
     */

    protected $userRepository;

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

        $this->userRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\User');

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

        $products = $this->productRepository->findAll();
       // $products = $this->productRepository->findBy(['active' => 1]); For front-end

        $users = $this->userRepository->findAll();


        // ...
        $response = new Response;
        $response->getBody()->write($this->blade->make('admin.index',['products'=>$products,'users'=>$users, 'auth'=>$this->auth])->render());
        return $response;

    }

}