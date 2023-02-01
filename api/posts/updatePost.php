<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/posts.php';


$database = new Database();
$db = $database->connect();

$posts = new Posts($db);

$data = json_decode(file_get_contents("php://input"));

$posts->id = $data->id;

$posts->title = $data->title;
$posts->body = $data->body;
$posts->thumbnail = $data->thumbnail;
// $posts->dateTime = $data->dateTime;
// $posts->categoryId = $data->categoryId;
// $posts->userId = $data->userId;

if($posts->updatePost()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

