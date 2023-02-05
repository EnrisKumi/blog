<?php

// include "../config/database.php";

class Signup extends DatabaseUsers {


    protected function setUser($firstNameA, $lastNameA, $usernameA, $emailA, $passwordA){

        $stmt = $this->connect()->prepare('INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?);');

        $hashedPass = password_hash($passwordA, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($firstNameA, $lastNameA, $usernameA, $emailA, $hashedPass))){

            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    //check if the username or email alreday exists in the database
    protected function checkUsers($usernameA,  $emailA) {

        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($usernameA, $emailA))){

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

