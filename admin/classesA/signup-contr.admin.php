<?php

//to make changes inside the database

class SignupContr extends Signup{   //TODO add avatar

    private $firstNameA;
    private $lastNameA;
    private $usernameA;
    private $emailA;
    private $passwordA;
    private $confirmPasswordA;

    public function __construct($firstNameA, $lastNameA, $usernameA, $emailA, $passwordA, $confirmPasswordA){

        $this->firstNameA = $firstNameA;
        $this->lastNameA = $lastNameA;
        $this->usernameA = $usernameA;
        $this->emailA = $emailA;
        $this->passwordA = $passwordA;
        $this->confirmPasswordA = $confirmPasswordA;

    }

    public function signupUser(){    //TODO make errors better

        if($this->emptyInputs() == false){
            $msg = "Empty Inputs";
            // header("location: ../index.php?error=emptyinput");
            //header("location: ../signup.php?msg=$msg");
            exit();
        }
        if($this->invalidUsername() == false){
            $msg = "Invalid Username";
            //header("location: ../signup.php?msg=$msg");
           //header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false){
            $msg = "Incalid Email";

            //header("location: ../signup.php?msg=$msg");
            //header("location: ../index.php?error=email");
            exit();
        }
        if($this->passwordMatch() == false){
            $msg = "Passwords Don't Match";

            //header("location: ../signup.php?msg=$msg");
            //header("location: ../index.php?error=passwordmatch");
            exit();
        }

        //Username taken

        if($this->usernameTakenCheck() == false){
            $msg = "This username is already taken";
            //header("location: ../signup.php?msg=$msg");
            //header("location: ../index.php?error=passwordmatch");
            exit();
        }

        $this->setUser($this->firstNameA, $this->lastNameA, $this->usernameA, $this->emailA, $this->passwordA);
    }

    private function emptyInputs(){

        $result = false;

        if(empty($this->firstNameA) || empty($this->lastNameA) || empty($this->usernameA) || empty($this->emailA) || empty($this->passwordA) || empty($this->confirmPasswordA))
        {
            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidUsername(){

        $result = false;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->usernameA)){

            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result = false;

        if(!filter_var($this->emailA, FILTER_VALIDATE_EMAIL)){

            $result = false;

        }else {
            $result = true;
        }

        return $result;
    }

    private function passwordMatch() {
        $result = false;

        if($this->passwordA !== $this->confirmPasswordA){

            $result = false;

        }else {

            $result = true;

        }

        return $result;
    }

    private function usernameTakenCheck() {
        $result = false;

        if(!$this->checkUsers($this->usernameA, $this->emailA)){

            $result = false;

        }else {

            $result = true;

        }

        return $result;
    }
}