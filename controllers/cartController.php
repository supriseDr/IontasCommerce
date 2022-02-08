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
use Iontas\Commerce\Models\Cart;

//Auth Exception
//use Jasny\Auth\LoginException;

use Jasny\Auth\Auth;

class cartController
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

    //Auth

    protected $auth;

    /**
     * construct a new cart
     */

    protected $cart;

    /**
     * Constructor for Dependency Injection
     */
    public function __construct(Blade $blade,EntityManager $entityManager, Auth $auth)
    {
        $this->blade = $blade;

        $this->entityManager = $entityManager;

        $this->auth = $auth;

        $this->productRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\Product');

        $this->cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => '0',
        
            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => '5',
        
            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]); // pass configuration keys

    }

    /**
     * Show cart view
     */

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

        /**Loop on cart items in the home page */

        if (!$this->cart->isEmpty()) {
            $allItems = $this->cart->getItems();
        }

        // ...
        $response = new Response;
        $response->getBody()->write($this->blade->make('cart',['foo'=>'bar','auth'=>$this->auth, 'cart'=>$allItems])->render());
        return $response;

    }

    /** Add item to cart */
    /**
     * 
     * function (ServerRequestInterface $request, array $args){
     * echo $args['id'];
     * }
     */

    public function addItem(ServerRequestInterface $request, array $args): ResponseInterface{
        /**
         * Find product from the database by id then add it
         * Or
         * You already know the item is in the database then you want to query it from the from
         */
        $id = $args['id'];
        $product = $this->productRepository->find($id);
         /**
          * If item already added add quantity
          */

        //default Quantity to 1
        $this->cart->add($product->getId(), '1', [
			'price' => $product->getPrice(),
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);


        //find a way to store cart to database this is working 
        //trigger storage event before session is destroyed or when checkout is clicked
        //echo var_dump($this->cart->getItems());
    }

    /**
     *  Clear the cart
     */

    public function emptyCart(){
        $this->cart->clear();
    }

    public function updateCart(ServerRequestInterface $request, array $args){
        $this->cart->update($args['id'], 'qty', [
			'price' => $_POST['price'],
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);

        /** or update it in the database */
    }

    public function removeItem(ServerRequestInterface $request, array $args){

        $id = $args['id'];
        $product = $this->productRepository->find($id);
        
        $this->cart->remove($product->id, [
			'price' => $product->price,
			'color' => (isset($_POST['color'])) ? $_POST['color'] : '',
		]);
    }

}