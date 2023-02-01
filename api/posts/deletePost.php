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


if($posts->deletePost()) {
    echo json_encode(
      array('message' => 'Post Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Deleted')
    );
  }