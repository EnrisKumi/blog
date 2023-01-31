<?php

class Users {
    private $conn;
    private $table = 'users';

    public $id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $password;
    public $avatar;
    public $is_admin;


    public function __construct($db){
        $this->conn = $db;
    }


    //create User
    public function create(){

        $query = 'INSERT INTO ' . $this->table .
            'SET 
        firstname= :firstname,
        lastname= :lastname,
        username= :username,
        email= :email,
        password= :password,
        avatar= :avatar,
        is_admin= :1';

        //Statement
        $stmt = $this->conn->prepare($query);

        //saitize data


        //bind data
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':is_admin', $this->is_admin);

        //execute query
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s. \n", $stmt->error);

        return false;
    }
}



?>