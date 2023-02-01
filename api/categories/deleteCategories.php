<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../admin/config/database.php';
include_once '../../models/categories.php';

$database = new Database();
$db = $database->connect();

$categories = new Categories($db);

$data = json_decode(file_get_contents("php://input"));

$categories->id = $data->id;

if($categories->deleteCategory()) {
    echo json_encode(
      array('message' => 'Category Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Category Not Deleted')
    );
  }