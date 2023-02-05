<?php

if(isset($_POST["submit"]))
{

    //Used to grab the data
    $firstNameA = $_POST["firstName"];
    $lastNameA = $_POST["lastName"];
    $usernameA = $_POST["username"];
    $emailA = $_POST["email"];
    $passwordA = $_POST["password"];
    $confirmPasswordA = $_POST["confirmPassword"];

    //Instantiate the contr class

    
    // include "../classes/signup.classes.php";
    // include "../classes/signup-contr.classes.php";

    include "../classesA/db.admin.classes.php";
    include "../classesA/signup.admin.classes.php";
    include "../classesA/signup-contr.admin.php";


    $signup = new SignupContr($firstNameA, $lastNameA, $usernameA, $emailA, $passwordA, $confirmPasswordA);

    $signup->signupUser();



    echo "skjjksdajksdjhdsajkd";

    //goingback to frontpage

    //header("location: ../../index.php?error=none");
}