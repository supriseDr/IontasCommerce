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

//use categories

use Iontas\Commerce\Models\Category;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */

 class Product
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

    private $imageUrl;

    /**
     * @ORM\Column(type="float")
     */

    private $price;

    /**
     * @ORM\Column(type="boolean")
     */

    private $active;

    /**
     * @ORM\Column(type="string")
     */

    private $description;

    /**
     * @ORM\Column(type="string")
     */

    private $shortDescription;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * Categories for relationship mapping
     */
    
     /**
     * @ORM\ManyToOne(targetEntity="Iontas\Commerce\Models\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */

    private $category;

    public function __construct()
    {
        /** Has relationships to categories */

        //$this->category = new ArrayCollection();
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

    public function setImageUrl(string $url):void{

        $this->imageUrl = $url;
    }

    // get product name

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    // set product name

    public function setName(string $name):void{

        $this->name = $name;
    }

     // get product price

     public function getPrice(): float
     {
         return $this->price;
     }
 
     // set product price
 
     public function setPrice(float $price):void{
         $this->price = $price;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    // set product Description

    public function setDescription(string $description):void{

        $this->description = $description;
    }

     // get product shortDescription

     public function getShortDescription():string
     {
 
         return $this->shortDescription;
     }

    public function setShortDescription(string $shortDescription): void
    {
       $this->shortDescription = $shortDescription;
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

      //assign product to categories
      public function assignToCategory(Category $category)
      {
          $this->category = $category;
      }
  
      public function getCategories()
      {
          return $this->category;
      }
  

   
 }