<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


include_once '../../admin/config/database.php';
include_once '../../models/categories.php';

$database = new Database();
$db = $database->connect();

$categories = new Categories($db);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$categories->title = $data->title;
$categories->description = $data->description;


if($categories->createCategories()) {
    echo json_encode(
        array('message' => 'Categories Created')
    );
} else {
    echo json_encode(
        array('message' => 'Categories was NOT created')
    );
}


?>