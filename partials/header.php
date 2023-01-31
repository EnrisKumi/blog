<?php
require 'config/database.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP and MYSQL</title>

    <!--Style-->
    <link rel="stylesheet" href="./css/style.css">
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!--End Of Style-->
  </head>
  <body>
    <!--Navbar-->
    <nav>
      <div class="container nav_container">
        <a href="<?= ROOT_URL ?>" class="nav_logo">Web</a>
        <ul class="nav_items">
          <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
          <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
          <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
          <li><a href="signin.php">Sign In</a></li>
          <!-- <li class="nav_profile">
            <div class="avatar">
              <img src="./images/avatar1.jpg" alt="Image not found" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
              <li><a href="<?= ROOT_URL ?>logout.php">Log Out</a></li>
            </ul>
          </li> -->
        </ul>

        <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
    <!--End Of Navbar-->