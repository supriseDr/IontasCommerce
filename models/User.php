<?php 

declare(strict_types=1);

/**
 * This is the Models File
 */
namespace Iontas\Commerce\Models;

//Doctrine Object Relational Mapper

use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Facades\Date;
use Jasny\Auth\ContextInterface;
use Jasny\Auth\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

 class User implements UserInterface
 {

    /**
     * @ORM\Column(type="string")
     */

    private $accessLevel = 1;

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

    private $username;

    /**
     * @ORM\Column(type="string")
     */

    private $hashedPassword;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * cart relationship in the database, there's one cart to one user
     * @ORM\OneToOne(targetEntity="Iontas\Commerce\Models\Cart", mappedBy="user")
     */
    private $cart;

    public function __construct()
    {
        /**
         * Construct A cart relationship
         */
    }

    // get user id
    public function getId(): int
    {
        return $this->id;
    }

    // Auth Id
    public function getAuthId(): string
    {
        return (string) $this->id;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->hashedPassword);

       //return true;
    }

    public function getAuthChecksum(): string
    {
        return hash('sha256', $this->id . $this->hashedPassword);
    }

    public function getAuthRole(?ContextInterface $context = null)
    {
        return (int) $this->accessLevel;
    }

    public function setAccessLevel(int $accessLevel):void{
        $this->accessLevel = $accessLevel;
    }

    public function requiresMfa() : bool
    {
        return false;
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

      // get user email

      public function getUsername(): string
      {
          return $this->username;
      }
  
      // set user email
  
      public function setUsername(string $username):void{
  
          $this->username = $username;
      }


    // set user password

    public function setPassword(string $password):void{

        $this->hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        //$this->password = $password;

    }

     // get user password

     public function getPassword(): string
     {
         return $this->hashedPassword;
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