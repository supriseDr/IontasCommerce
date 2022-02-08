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

 class Coupon
 {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */

    private $id;

    /**
     * @ORM\Column(type="string")
     */

    private $code;

     /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $use_times;

    /**
     * @ORM\Column(type="integer")
     */
    private $used_times;

     /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

     /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;


 
}