<?php

session_start();
$userIdT = $_SESSION["id"];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/posts.php';

$database = new Database();
$db = $database->connect();

$posts = new Posts($db);

$posts->userId = $userIdT; 
//userId

$results = $posts->getAllPostsById();

$rows = $results-> rowCount();


if($rows > 0){
    $postsArray = array();

    while($rows = $results->fetch(PDO::FETCH_ASSOC)){
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

// $postArray = array(
//     'id' => $posts->id,
//     'title' => $posts->title,
//     'body' => $posts->body,
//     'thumbnail' => $posts->thumbnail,
//     'dateTime' => $posts->dateTime,
//     'categoryId' => $posts->categoryId,
//     'userId' => $posts->userId,
// );

// print_r(json_encode($postArray));