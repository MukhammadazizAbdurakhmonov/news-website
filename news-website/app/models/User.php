<?php 

/**
 * User
 * 
 * Handling users data
 * Register, login
 */
class User{

    /**
     * Database connection
     *
     * @var [object]
     */
    private $db;
    /**
     * Construct function
     * 
     * Creating a new database connection
     */
    public function __construct(){
        $this->db = new Database;
    }

    /**
     * Creating a new user
     *
     * @return boolean
     */
    public function createUser($data){
        $this->db->query('INSERT INTO users (name, email, password)  VALUES(:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

    /**
     * Finding user by email
     *
     * @param [array] $data
     * @return void
     */
    public function findUserByEmail($data){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $data['email']);
        $this->db->execute();

        return $this->db->singleResult();
    }

    public function getAllUsers(){
        $this->db->query('SELECT * FROM users');
        $this->db->execute();

        return $this->db->results();
    }

    public function editorPermission($data){
        $this->db->query('UPDATE users SET editor = :editor WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':editor', $data['editor']);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
}