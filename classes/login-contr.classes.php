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
            header("location: ../index.php?error=emptyinput");
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
