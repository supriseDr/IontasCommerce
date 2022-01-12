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

//Auth Exception
use Jasny\Auth\LoginException;

use Jasny\Auth\Auth;

class signInController
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

    //protected $productRepository;

    //Auth

    protected $auth;

    /**
     * Constructor for Dependency Injection
     */
    public function __construct(Blade $blade,EntityManager $entityManager, Auth $auth)
    {
        $this->blade = $blade;

        $this->entityManager = $entityManager;

        $this->auth = $auth;

       // $this->productRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\Product');

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
       // $products = $this->productRepository->findBy(array('active' => 1));

        // ...
        $response = new Response;
        //$response->getBody()->write($this->blade->make('homepage',['foo'=>'bar','products'=>$products])->render());
        $response->getBody()->write($this->blade->make('sign-in',['foo'=>'bar'])->render());
        return $response;

    }

    /**
     * Login Method
     */
    public function login(ServerRequestInterface $request){
        /**
         * Catch the form username and password via request argument
         */
        try {
            //$auth->login($_POST['Kenneth Leannon'], $_POST['password']);
            $this->auth->login($_POST['username'],$_POST['password']);
        } catch (LoginException $exception) {
            http_response_code(400);
            echo $exception->getMessage();
        }
        http_response_code(303);
        header("Location: /");
        //echo "You're being redirected to <a href='/dashboard'>the dashboard</a>.";

    }

    public function logout(ServerRequestInterface $request){

        $this->auth->logout();
       // http_response_code(303);
       // header("Location: /");
    }

}