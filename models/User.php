<?php 

declare(strict_types=1);

/**
 * This is the Models File
 */
namespace Iontas\Commerce\Models;

//Doctrine Object Relational Mapper

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Facades\Date;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

 class User
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

    private $email;

    /**
     * @ORM\Column(type="string")
     */

    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    // get user id
    public function getId(): int
    {
        return $this->id;
    }

    // get user email

    public function getEmail(): string
    {
        return $this->email;
    }

    // set user email

    public function setEmail(string $email):void{

        $this->email = $email;
    }


    // set user password

    public function setPassword(string $password):void{

        $this->password = $password;
    }

     // get user password

     public function getPassword(): string
     {
         return $this->password;
     }


     // get user createdAt

     public function getCreatedAt()
     {
         return $this->createdAt;
     }
 
     // set user createdAt
 
     public function setCreatedAt():void{
 
         $this->createdAt = new \DateTime("now");
     }

      // get get updatedAt

      public function getUpdatedAt()
      {
          return $this->updatedAt;
      }
  
      // set user updatedAt
  
      public function setUpdatedAt():void{
  
          $this->updatedAt = new \DateTime("now");
      }

   
 }