<?php

//$url = "http://localhost/blog/admin/manage-categories.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../admin/config/database.php';
include_once '../../models/categories.php';

$database = new Database();
$db = $database->connect();

$categories = new Categories($db);

$categories->id = isset($_GET['id']) ? $_GET['id'] : die();


// $categories->id = $data->id;

if($categories->deleteCategory()) {
    // echo json_encode(
    //   array('message' => 'Category Deleted')
    // );
    header("location: http://localhost/blog/admin/manage-categories.php");  //TODO change url
  } else {
    echo json_encode(
      array('message' => 'Category Not Deleted')
    );
  }