<?php

//databse related query

class Signup extends DatabaseUsers{


    protected function setUser($firstName, $lastName, $username, $email, $password){

        $stmt = $this->connect()->prepare('INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?);');

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($firstName, $lastName, $username, $email, $hashedPass))){

            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    //check if the username or email alreday exists ib the database
    protected function checkUsers($username,  $email) {

        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($username, $email))){

            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $result = false;
        if($stmt->rowCount() > 0){
            $result = false;
        }else {
            $result = true;
        }

        return $result;

    }

}

