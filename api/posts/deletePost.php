<?php

session_start();

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/posts.php';

$database = new Database();
$db = $database->connect();

$posts = new Posts($db);


$posts->id = isset($_GET['id']) ? $_GET['id'] : die();


if ($posts->deletePost()) {

  if ($_SESSION["isAdmin"] == 1) {
    //echo $_SESSION["isAdmin"];
    header("location: http://localhost/blog/admin/dashboard.php"); //TODO change url
  } else {
    //echo $_SESSION["isAdmin"];
    header("location: http://localhost/blog/userDashboard.php"); //TODO change url
  }
} else {
  echo json_encode(
    array('message' => 'Post Not Deleted')
  );
}
