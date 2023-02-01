<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../admin/config/database.php';
include_once '../../models/categories.php';

$database = new Database();
$db = $database->connect();

$categories = new Categories($db);

$categories->id = isset($_GET['id']) ? $_GET['id'] : die();

$categories->getCategoriesById();

$categoryArray = array(
    'id' => $categories->id,
    'title' => $categories->title,
    'description' => $categories->description,
);

print_r(json_encode($categoryArray));