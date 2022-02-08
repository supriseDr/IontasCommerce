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
 * @ORM\Table(name="addresses")
 */

 class Address
 {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */

    private $id;

    /**
     * Related to a User Id
     */

     /**
      * @ORM\Column(type="boolean")
      */
    private $default;

    /**
      * @ORM\Column(type="string")
      */
    private $firstname;

     /**
      * @ORM\Column(type="string")
      */
    private $lastname;

     /**
      * @ORM\Column(type="string")
      */
    private $email;

     /**
      * @ORM\Column(type="string")
      */
    private $phone;

     /**
      * @ORM\Column(type="string")
      */
    private $address1;

     /**
      * @ORM\Column(type="string")
      */
      private $address2;

    /**has relations with country */

    /**has relations with state */

    /**has relations with city */

     /**
      * @ORM\Column(type="integer")
      */
      private $zipcode;

       /**
      * @ORM\Column(type="integer")
      */
      private $po_box;


      /**
     * @ORM\Column(type="datetime")
     */
     private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;




 
}