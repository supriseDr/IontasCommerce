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
 * @ORM\Table(name="reviews")
 */

 class Review
 {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */

    private $id;

    /**Relationship 
     * A review is linked to a user
    */

    /**
     * Relationship
     * A review is linked to a product
     */

    /**
     * @ORM\Column(type="string")
     */

    private $comment;

     /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\Column(type="string")
     */
    private $ip_address;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;


 
}