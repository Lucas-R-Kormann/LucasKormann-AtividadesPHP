<?php

class User{

    private $conn;

     public function __construct($db){
        $this-> conn = $db;
    }


public function login($email,$password){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':email', $email);
        $stmt ->execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);


        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return false;
    }


    public function getUserById($userId){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':id', $userId);
        $stmt ->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}
    ?>