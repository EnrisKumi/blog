<?php

//require 'constants.php';

//databse connection


// $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if (mysqli_errno($connection)) {
//     die(mysqli_errno($connection));
// }


class Database {
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'blog_fe';
    private $connection;

    public function connect() {

        $this->connection = null;
        $dns = "mysql:host=$this->DB_HOST;dbname=$this->DB_NAME";

    try{

      $this->connection = new PDO($dns, $this->DB_USER, $this->DB_PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $error){
        echo 'Connection Error' . $error->getMessage();
    }

        return $this->connection;

    }
}