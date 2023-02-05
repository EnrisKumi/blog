<?php

if(isset($_POST["submit"]))
{

    //Used to grab the data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    //Instantiate the contr 
    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";


    $signup = new SignupContr($firstName, $lastName, $username, $email, $password, $confirmPassword);
    $login = new LoginContr($username, $password);

    $signup->signupUser();
    $login->loginUser();


    echo "skjjksdajksdjhdsajkd";

    //goingback to frontpage

    header("location: ../index.php?error=none");
}       