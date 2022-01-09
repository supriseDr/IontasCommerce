<?php 

/**
 * Authstorage Repository for Jasny Auth Implementation
 */

 use Jasny\Auth;

 use Jasny\Auth\User\BasicUser;

 use Doctrine\ORM\EntityRepository;

 class AuthStorage extends EntityRepository implements Auth\StorageInterface
 {

    //construct to connect to database
    public function __construct()
    {
        
    }

    public function fetchUserById(string $id): ?Auth\UserInterface
    {
        /*
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $data !== null ? BasicUser::fromData($data) : null;
        */
        return null;
    }

    public function fetchUserByUsername(string $username): ?Auth\UserInterface
    {
        /*
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?"); // could use email instead of username
        $stmt->execute([$username]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $data !== null ? BasicUser::fromData($data) : null;
        */
        return null;
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