<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/posts.php';

$database = new Database();
$db = $database->connect();

$posts = new Posts($db);

$posts->id = isset($_GET['id']) ? $_GET['id'] : die();

$posts->getPostById();

$postArray = array(
    'id' => $posts->id,
    'title' => $posts->title,
    'body' => $posts->body,
    'thumbnail' => $posts->thumbnail,
    'dateTime' => $posts->dateTime,
    'categoryId' => $posts->categoryId,
    'userId' => $posts->userId,
);

print_r(json_encode($postArray));
