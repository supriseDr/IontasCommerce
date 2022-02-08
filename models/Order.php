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
 * @ORM\Table(name="orders")
 */

 class Order
 {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */

    private $id;

    /** Order belongs to do User */

    /** User has a order address */

    /**
     * @ORM\Column(type="string")
     */
    private $delivery_address;

    /**
     * Order has a payment method relations
    */

    /** Order has a coupon code used */

    /**
     * @ORM\Column(type="double")
     */
    private $discount = 0.00;

    /**
     * @ORM\Column(type="double")
     */
    private $subtotal = 0.00;

    /**
     * @ORM\Column(type="double")
     */
    private $shipping_cost = 0.00;

    /**
     * @ORM\Column(type="double")
     */
    private $tax_rate = 0.00;

    /**
     * @ORM\Column(type="double")
     */
    private $total_cost = 0.00;

    /**
     * @ORM\Column(type="string")
     */
    private $currency = 'ZAR';

     /**
      * Type Enum [confirmed, pending , in-transit, canceled , delivered]
     * @ORM\Column(type="string")
     */
    private $status;

      /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;



 
}