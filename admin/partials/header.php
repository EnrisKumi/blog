<?php

include 'config/database.php';
$db = new Database();
$db->connect();

session_start();
if (!isset($_SESSION["id"])){
  header("location: signin.php?error=none");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP and MYSQL</title>

    <!--Style-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
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
          <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
          <!-- <li><a href="signin.html">Sign In</a></li> -->
          <?php
        if (isset($_SESSION["id"])) {
        ?>

          <li><a href="#"><?php echo $_SESSION["username"]; ?></a></li>
          <?php 
          if($_SESSION["isAdmin"] === 0){?>
            <li class="nav_profile">
            <div class="avatar">
              <img src="images/userAvatar.png" alt="Image not found" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>userDashboard.php">Dashboard</a></li>
              <li><a href="../includes/logout.inc.php">Log Out</a></li>
            </ul>
          </li>
          <?php 
          } else {  ?>
            <li class="nav_profile">
            <div class="avatar">
              <img src="images/avatar.png" alt="Image not found" />
            </div>
            <ul>
              <li><a href="<?= ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
              <li><a href="../includes/logout.inc.php">Log Out</a></li>
            </ul>
          </li>
          <?php 
          } ?>
          <?php
        } else {
          ?>

          <li><a href="signin.php">Sign In</a></li>

          <?php
        }
          ?>
        </ul>

        <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
      </div>
    </nav>
    <!--End Of Navbar-->