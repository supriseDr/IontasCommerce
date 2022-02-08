<?php 

declare(strict_types=1);

/**
 * This is the Models File
 */
namespace Iontas\Commerce\Models;

//Doctrine Object Relational Mapper

use Doctrine\ORM\Mapping as ORM;

use Illuminate\Support\Facades\Date;

//use array collections for relationships, One(category)ToMany(products)

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */

 class Category
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

    private $name;

    /**
     * @ORM\Column(type="string")
     */

    private $slug;

    /**
     * @ORM\Column(type="string")
     */

    private $cover;

    /**
     * Create a relationship with Parent ID for the category
     */

     /**
     * @ORM\Column(type="integer")
     */
    
    private $parent_id;

    /**
     * @ORM\Column(type="boolean")
     */

    private $active;

    /**
     * @ORM\Column(type="string")
     */

    private $description;


    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

     /**
     * @ORM\OneToMany(targetEntity="Iontas\Commerce\Models\Product",  mappedBy="category")
     */
    private $products;


    public function __construct()
    {
         /** Has relationships to products */

         $this->products = new ArrayCollection();
    }

    // get product id
    public function getId(): int
    {
        return $this->id;
    }

    // get product name

    public function getName(): string
    {
        return $this->name;
    }

    // set product name

    public function setName(string $name):void{

        $this->name = $name;
    }


      // get product active

    public function getActive(): bool
    {
        return $this->active;
    }

    // set product active

    public function setActive(bool $boolean):void{
        $this->active = $boolean;
    }


    // set product active

    public function setSlug(string $slug):void{
        $this->slug = $slug;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }


    public function setCover(string $cover):void{
        $this->cover = $cover;
    }

    public function getCover(): string
    {
        return $this->cover;
    }

    public function setParentId(int $id):void{
        $this->parent_id = $id;
    }

    public function getParentId(): string
    {
        return $this->parent_id;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    // set product Description

    public function setDescription(string $description):void{

        $this->description = $description;
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

      //assign category to product
      public function assignToProduct(Product $product)
      {
          $this->products[] = $product;
      }
  
      public function getProducts()
      {
          return $this->products;
      }

   
 }