<?php

class User{

    private $conn;

     public function __construct($db){
        $this-> conn = $db;
    }


public function login($email,$password){
        $sql = "SELECT * FROM usuarios WHERE email_usuario = :email_usuario";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':email_usuario', $email);
        $stmt ->execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);


        if($user && password_verify($password, $user['senha_usuario'])){
            return $user;
        }
        return false;
    }


    public function getUserById($userId){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $stmt = $this -> conn->prepare($sql);
        $stmt ->bindParam(':id_usuario', $userId);
        $stmt ->execute();
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}
    ?>