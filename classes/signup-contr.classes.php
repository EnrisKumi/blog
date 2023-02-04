<?php

//to make changes inside the database

class SignupContr extends Signup{

    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;
    private $confirmPassword;

    public function __construct($firstName, $lastName, $username, $email, $password, $confirmPassword){

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;

    }

    public function signupUser(){

        if($this->emptyInputs() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->passwordMatch() == false){
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        //Username taken

        if($this->usernameTakenCheck() == false){
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        $this->setUser($this->firstName, $this->lastName, $this->username, $this->email, $this->password);
    }

    private function emptyInputs(){

        $result = false;

        if(empty($this->firstName) || empty($this->lastName) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirmPassword))
        {
            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidUsername(){

        $result = false;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){

            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result = false;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function passwordMatch() {
        $result = false;

        if($this->password !== $this->confirmPassword){

            $result = false;

        }else {

            $result = true;

        }

        return $result;
    }


    // TODO check if username alreday exists

    private function usernameTakenCheck() {
        $result = false;

        if(!$this->checkUsers($this->username, $this->email)){

            $result = false;

        }else {

            $result = true;

        }

        return $result;
    }
}