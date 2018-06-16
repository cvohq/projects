<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;

/**
 * Description of User
 *
 * @author cv
 */
class User {
    private $id;
    private $name;
    private $email;
    private $created;
    
    public function getID() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getCreated() {
        return $this->created;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setCreated($created) {
        $this->created = $created;
    }
    
    public static function adduser(User $user)
    {
        try{
            // Prepare an insert statement
            $sql = "INSERT INTO users (user_name, email, created) VALUES (:name, :email, :created);";
            $stmt = \Classes\Mysql::getConnection()->prepare($sql);

            // Bind parameters to statement
            $stmt->bindParam(':name',   $name,  \PDO::PARAM_STR);
            $stmt->bindParam(':email',      $email,     \PDO::PARAM_STR);
            $stmt->bindParam(':created',    $created,   \PDO::PARAM_STR);

            $name = $user->getName(); 
            $email = $user->getEmail();
            $created = $user->getCreated();
            
            $stmt->execute();
         
        } catch(PDOException $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
            return 0;
        } 

        // Close statement
        unset($stmt);
        return 1;
    }
    
    public static function getAlluser()
    {
        $users = [];
        try{
            $sql = "SELECT * FROM users";   
            $result =\Classes\Mysql::getConnection()->query($sql);
            if($result->rowCount() > 0){
                while($row = $result->fetch()){
                    $user = new User;    
                    $user->setID($row['id_user']);  
                    $user->setName($row['user_name']);
                    $user->setEmail($row['email']);
                    $user->setCreated($row['created']);
                    $users[] = $user;
                }        
            // Free result set
            unset($result);
            } else{
                echo "No records matching your query were found.";
            }
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
        
        return $users;
    }
    
    public static function get_user_
}
