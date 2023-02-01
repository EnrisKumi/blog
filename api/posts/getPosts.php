<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/posts.php';

$database = new Database();
$db = $database->connect();

$posts = new Posts($db);

$result = $posts->getPosts();

$rows = $result->rowCount();

if($rows > 0){
    $postsArray = array();

    while($rows = $result->fetch(PDO::FETCH_ASSOC)){
        extract($rows);

        $postItem = array(
            'id' => $id,
            'title' => $title,
            'body' => $body,
            'thumbnail' => $thumbnail,
            'dateTime' => $dateTime,
            'categoryId' => $categoryId,
            'userId' => $userId
        );

        array_push($postsArray, $postItem);
    }

    echo json_encode($postsArray);
} else {
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}