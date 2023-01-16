<?php

class User
{
    public $db;
    public function __construct()
    {
        $this-> db = new Database; 
    }


    
    // _________________login function____________________
    public function login($email)
    {
        $this-> db-> query("SELECT * FROM user WHERE email = :email");
        $this-> db-> bind(":email",$email);
        $this-> db-> execute();
        return $row = $this-> db-> fetch();
    }
    
    public function signup($email,$password)
    {
        $this-> db-> query("INSERT INTO users(userEmail,userPassword) 
        VALUES (:email,:password)");
        $this-> db-> bind(":email",$email);
        $this-> db-> bind(":password",$password);
        $this-> db-> execute();
    }

}