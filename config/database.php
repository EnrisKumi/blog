<?php
require 'config/constants.php';


class Database {
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'blog_fe';
    private $conn;

    public function connect() {

        $this->conn = null;
        // $dns = "mysql:host=$this->DB_HOST;dbname=$this->DB_NAME";

    try{

      $this->conn = new PDO('mysql:host=' . $this->DB_HOST . ';dbname=' . $this->DB_NAME, $this->DB_USER, $this->DB_NAME);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $error){
        echo 'Connection Error' . $error->getMessage();
    }

        return $this->conn;

    }
}