<?php

class Users
{
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


    public function __construct($db)
    {
        $this->conn = $db;
    }


    //create User
    public function create()
    {
        try {

            $query = "INSERT INTO " . $this->table . '(firstname, lastname,username,email,password,avatar,isAdmin)';
            $query .= "VALUES(:fn,:ln,:un,:em,:pass,:ava,:isadmn)";

            //Statement
            $stmt = $this->conn->prepare($query);

            //saitize data
            $this->firstname = htmlspecialchars($this->firstname);
            $this->lastname = htmlspecialchars($this->lastname);
            $this->email = htmlspecialchars($this->email);
            $this->password = htmlspecialchars($this->password);
            $this->avatar = htmlspecialchars($this->avatar);
            $this->isAdmin = htmlspecialchars($this->isAdmin);

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
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function getUsers()
    {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getUserById()
    {
        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE id = ? ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $data["id"];
        $this->firstname = $data["firstname"];
        $this->lastname = $data["lastname"];
        $this->username = $data["username"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->avatar = $data["avatar"];
        $this->isAdmin = $data["isAdmin"];
    }

    public function updateUser()
    {
        try {
            $query = "UPDATE " . $this->table . ' SET 
            firstname = :fn,
            lastname = :ln,
            isAdmin = :isadm
            WHERE 
            id = :i';

            // username = :un,
            // email= :em,
            // password = :pass,
            // avatar = :ava,

            $stmt = $this->conn->prepare($query);

            $this->firstname = htmlspecialchars(strip_tags($this->firstname));
            $this->lastname = htmlspecialchars(strip_tags($this->lastname));
            // $this->username = htmlspecialchars(strip_tags($this->username));
            // $this->email = htmlspecialchars(strip_tags($this->email));
            // $this->password = htmlspecialchars(strip_tags($this->password));
            // $this->avatar = htmlspecialchars(strip_tags($this->avatar));
            $this->isAdmin = htmlspecialchars(strip_tags($this->isAdmin));
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':fn', $this->firstname);
            $stmt->bindParam(':ln', $this->lastname);
            // $stmt->bindParam(':un', $this->username);
            // $stmt->bindParam(':em', $this->email);
            // $stmt->bindParam(':pass', $this->password);
            // $stmt->bindParam(':ava', $this->avatar);
            $stmt->bindParam(':isadm', $this->isAdmin);
            $stmt->bindParam(':i', $this->id);

            $Execute = $stmt->execute();
            return ($Execute ? true : false);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function deleteUser() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :i';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':i', $this->id);

        $Execute = $stmt->execute();
        return ($Execute ? true : false);

    }

}
