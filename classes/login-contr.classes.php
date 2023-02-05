<?php


class LoginContr extends Login{
    private $username;
    private $password;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;

    }

    public function loginUser(){

        if($this->emptyInputs() == false){
            
            $msg = "You left one or more of the required fields blank.";

            header("location: ../signin.php?msg=$msg");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

     private function emptyInputs(){

        $result = false;

        if(empty($this->username) || empty($this->password))
        {
            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }
}
