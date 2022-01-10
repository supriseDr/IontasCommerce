<?php 

/**
 * Authstorage Repository for Jasny Auth Implementation
 */
namespace Iontas\Commerce\Models\Repository;

use Doctrine\ORM\EntityManager;

use Jasny\Auth;

 use Jasny\Auth\User\BasicUser;

 // use user model to query data

 use Iontas\Commerce\Models\User;

 class AuthStorage implements Auth\StorageInterface
 {

    //construct to connect to database with entity manager

    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        $this->userRepository = $this->entityManager->getRepository('Iontas\Commerce\Models\User');

    }

    public function fetchUserById(string $id): ?Auth\UserInterface
    {
        /*
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $data !== null ? BasicUser::fromData($data) : null;
        */
        return $this->userRepository->find($id);
        /*
        if ($user === null) {
            echo "No user found.\n";
            exit(1);
        }
        return $user;
        */
        //return $user !== null ? BasicUser::fromData((array) $user) : null;

    }

    public function fetchUserByUsername(string $username): ?Auth\UserInterface
    {
        /*
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?"); // could use email instead of username
        $stmt->execute([$username]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $data !== null ? BasicUser::fromData($data) : null;
        */

        //$dql = "SELECT u FROM Iontas\Commerce\Models\User";

        //$query = $this->entityManager->createQuery($dql);

       
        return $this->userRepository->findOneBy(['username' => $username]);
       /*
        $user = $this->userRepository->findOneBy(['username' => $username]);
        if ($user === null) {
            echo "No user found.\n";
            exit(1);
        }
        //return null;
        return $user !== null ? BasicUser::fromData((array) $user) : null;
        */
        
    }

    public function fetchContext(string $id) : ?Auth\ContextInterface
    {
        // Return null if this application doesn't work with teams or organizations for auth.
        return null;
    }

    /**
     * Get the default context of the user.  
     */
    public function getContextForUser(Auth\UserInterface $user) : ?Auth\ContextInterface
    {
        return null;
    }
    
 }