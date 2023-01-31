<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../admin/config/database.php';
include_once '../../models/posts.php';

$databse = new Database();
$db = $databse->connect();

$post = new Posts($db);

//Raw Posted Data
$data = json_decode(file_get_contents("php://input"));


$post->title = $data->title;
$post->body = $data->body;
$post->thumbnail = $data->thumbnail;

if($post->createPost()) {
    echo json_encode(
      array('message' => 'Post Created')
    );
} else {
    echo json_encode(
        array('message' => 'Post Not Created')
    );
}


?>