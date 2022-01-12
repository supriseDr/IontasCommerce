<?php 

declare(strict_types=1);

/**
 * This is the Models File
 */
namespace Iontas\Commerce\Models;

//Doctrine Object Relational Mapper

use Doctrine\ORM\Mapping as ORM;

use Illuminate\Support\Facades\Date;

//use array collections for relationships, Many(products)ToOne(category)

use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Entity
 * @ORM\Table(name="carts")
 */

 class Cart
 {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */

    private $id;

    /**
     * @ORM\Column(type="integer")
     */

    private $cartMaxItem = 0;

    /**
     * @ORM\Column(type="integer")
     */

    private $itemMaxQuantity;

    /**
     * @ORM\Column(type="boolean")
     */

    private $useCookie = false;

    /**
     * Collection of Cart Items
     */

    private $items = [] ;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

  /**
   * Constructor takes array of 
   */

    public function __construct($options = [])
    {
        /** Construct Array Collection for Cart Items */

       // $this->items = new ArrayCollection();

        /**
         * Inspect if No Session Id Exists Then construct it
         */
        if (!session_id()) {
			session_start();
		}

		if (isset($options['cartMaxItem']) && preg_match('/^\d+$/', $options['cartMaxItem'])) {
			$this->cartMaxItem = $options['cartMaxItem'];
		}

		if (isset($options['itemMaxQuantity']) && preg_match('/^\d+$/', $options['itemMaxQuantity'])) {
			$this->itemMaxQuantity = $options['itemMaxQuantity'];
		}

		if (isset($options['useCookie']) && $options['useCookie']) {
			$this->useCookie = true;
		}

		$this->cartId = md5((isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : 'SimpleCart') . '_cart';

		$this->read(); //define read method
    }

    // get product id
    public function getId(): int
    {
        return $this->id;
    }

     // get product createdAt

     public function getCreatedAt()
     {
         return $this->createdAt;
     }
 
     // set product createdAt
 
     public function setCreatedAt():void{
 
         $this->createdAt = new \DateTime("now");
     }

      // get product updatedAt

      public function getUpdatedAt()
      {
          return $this->updatedAt;
      }
  
      // set product createdAt
  
      public function setUpdatedAt():void{
  
          $this->updatedAt = new \DateTime("now");
      }

      /**
	 * Get items in  cart.
	 *
	 * @return array
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Check if the cart is empty.
	 *
	 * @return bool
	 */
	public function isEmpty()
	{
		return empty(array_filter($this->items));
	}

	/**
	 * Get the total of item in cart.
	 *
	 * @return int
	 */
	public function getTotalItem()
	{
		$total = 0;

		foreach ($this->items as $items) {
			foreach ($items as $item) {
				++$total;
			}
		}

		return $total;
	}

	/**
	 * Get the total of item quantity in cart.
	 *
	 * @return int
	 */
	public function getTotalQuantity()
	{
		$quantity = 0;

		foreach ($this->items as $items) {
			foreach ($items as $item) {
				$quantity += $item['quantity'];
			}
		}

		return $quantity;
	}

	/**
	 * Get the sum of a attribute from cart.
	 *
	 * @param string $attribute
	 *
	 * @return int
	 */
	public function getAttributeTotal($attribute = 'price')
	{
		$total = 0;

		foreach ($this->items as $items) {
			foreach ($items as $item) {
				if (isset($item['attributes'][$attribute])) {
					$total += $item['attributes'][$attribute] * $item['quantity'];
				}
			}
		}

		return $total;
	}

	/**
	 * Remove all items from cart.
	 */
	public function clear()
	{
		$this->items = [];
		$this->write();
	}

	/**
	 * Check if a item exist in cart.
	 *
	 * @param string $id
	 * @param array  $attributes
	 *
	 * @return bool
	 */
	public function isItemExists($id, $attributes = [])
	{
		$attributes = (is_array($attributes)) ? array_filter($attributes) : [$attributes];

		if (isset($this->items[$id])) {
			$hash = md5(json_encode($attributes));
			foreach ($this->items[$id] as $item) {
				if ($item['hash'] == $hash) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Get one item from cart
	 *
	 * @param string $id
	 * @param string $hash
	 *
	 * @return array
	 */
	public function getItem($id, $hash = null)
	{
		if($hash){
			$key = array_search($hash, array_column($this->items[$id], 'hash'));
			if($key !== false)
				return $this->items[$id][$key];
			return false;
		}
		else
			return reset($this->items[$id]);
	}

	/**
	 * Add item to cart.
	 *
	 * @param string $id
	 * @param int    $quantity
	 * @param array  $attributes
	 *
	 * @return bool
	 */
	public function add($id, $quantity = '1', $attributes = [])
	{
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;
		$attributes = (is_array($attributes)) ? array_filter($attributes) : [$attributes];
		$hash = md5(json_encode($attributes));

		if (count($this->items) >= $this->cartMaxItem && $this->cartMaxItem != 0) {
			return false;
		}

		if (isset($this->items[$id])) {
			foreach ($this->items[$id] as $index => $item) {
				if ($item['hash'] == $hash) {
					$this->items[$id][$index]['quantity'] += $quantity;
					$this->items[$id][$index]['quantity'] = ($this->itemMaxQuantity < $this->items[$id][$index]['quantity'] && $this->itemMaxQuantity != 0) ? $this->itemMaxQuantity : $this->items[$id][$index]['quantity'];

					$this->write();

					return true;
				}
			}
		}

		$this->items[$id][] = [
			'id'         => $id,
			'quantity'   => ($quantity > $this->itemMaxQuantity && $this->itemMaxQuantity != 0) ? $this->itemMaxQuantity : $quantity,
			'hash'       => $hash,
			'attributes' => $attributes,
		];

		$this->write();

		return true;
	}

	/**
	 * Update item quantity.
	 *
	 * @param string $id
	 * @param int    $quantity
	 * @param array  $attributes
	 *
	 * @return bool
	 */
	public function update($id, $quantity = '1', $attributes = [])
	{
		$quantity = (preg_match('/^\d+$/', $quantity)) ? $quantity : 1;

		if ($quantity == 0) {
			$this->remove($id, $attributes);

			return true;
		}

		if (isset($this->items[$id])) {
			$hash = md5(json_encode(array_filter($attributes)));

			foreach ($this->items[$id] as $index => $item) {
				if ($item['hash'] == $hash) {
					$this->items[$id][$index]['quantity'] = $quantity;
					$this->items[$id][$index]['quantity'] = ($this->itemMaxQuantity < $this->items[$id][$index]['quantity'] && $this->itemMaxQuantity != 0) ? $this->itemMaxQuantity : $this->items[$id][$index]['quantity'];

					$this->write();

					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Remove item from cart.
	 *
	 * @param string $id
	 * @param array  $attributes
	 *
	 * @return bool
	 */
	public function remove($id, $attributes = [])
	{
		if (!isset($this->items[$id])) {
			return false;
		}

		if (empty($attributes)) {
			unset($this->items[$id]);

			$this->write();

			return true;
		}
		$hash = md5(json_encode(array_filter($attributes)));

		foreach ($this->items[$id] as $index => $item) {
			if ($item['hash'] == $hash) {
				unset($this->items[$id][$index]);
				$this->items[$id] = array_values($this->items[$id]);

				$this->write();

				return true;
			}
		}

		return false;
	}

	/**
	 * Destroy cart session.
	 */
	public function destroy()
	{
		$this->items = [];

		if ($this->useCookie) {
			setcookie($this->cartId, '', -1);
		} else {
			unset($_SESSION[$this->cartId]);
		}
	}

	/**
	 * Read items from cart session.
	 */
	private function read()
	{
		$this->items = ($this->useCookie) ? json_decode((isset($_COOKIE[$this->cartId])) ? $_COOKIE[$this->cartId] : '[]', true) : json_decode((isset($_SESSION[$this->cartId])) ? $_SESSION[$this->cartId] : '[]', true);
	}

	/**
	 * Write changes into cart session.
	 */
	private function write()
	{
		if ($this->useCookie) {
			setcookie($this->cartId, json_encode(array_filter($this->items)), time() + 604800, "/");
		} else {
			$_SESSION[$this->cartId] = json_encode(array_filter($this->items));
		}
	}
  

   
 }