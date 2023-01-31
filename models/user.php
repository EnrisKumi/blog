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
    public $isAdmin;


    public function __construct($db){
        $this->conn = $db;
    }


    //create User
    public function create(){
        try{

        $query = "INSERT INTO " . $this->table . '(firstname, lastname,username,email,password,avatar,isAdmin)';
        $query .= "VALUES(:fn,:ln,:un,:em,:pass,:ava,:isadmn)"; 

        //Statement
        $stmt = $this->conn->prepare($query);

        //saitize data
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->avatar = htmlspecialchars(strip_tags($this->avatar));
        $this->isAdmin = htmlspecialchars(strip_tags($this->isAdmin));

        //bind data
        $stmt->bindParam(':fn', $this->firstname);
        $stmt->bindParam(':ln', $this->lastname);
        $stmt->bindParam(':un', $this->username);
        $stmt->bindParam(':em', $this->email);
        $stmt->bindParam(':pass', $this->password);
        $stmt->bindParam(':ava', $this->avatar);
        $stmt->bindParam(':isadmn', $this->isAdmin);

        //execute query
        $Execute = $stmt->execute();
        return ($Execute ? true : false);
        } catch(Exception $e){
            echo $e;
        }
    }
}
