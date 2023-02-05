<?php

if(isset($_POST["submit"]))
{

    $username = $_POST["username"];
    $password = $_POST["password"];

    //Instantiate the contr class

    include "../classes/db.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($username, $password);

    //error handlers /user signup

    $login->loginUser();


    //goingback to frontpage

    header("location: ../index.php?error=none&id=". $_SESSION["id"]);
}