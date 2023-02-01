<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../admin/config/database.php';
include_once '../../models/categories.php';

$database = new Database();
$db = $database->connect();

$categories = new Categories($db);

$result = $categories->getCategories();

$rows = $result->rowCount();

if ($rows > 0) {
    $categoriesArray = array();

    while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($rows);

        $categoriesItems = array(
            'id' => $id,
            'title' => $title,
            'description' => $description,
        );

        array_push($categoriesArray, $categoriesItems);
    }
    echo json_encode($categoriesArray);
} else {
    echo json_encode(
        array('message' => 'No Categories Found')
    );
}
