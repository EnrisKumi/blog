<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

if($user->deleteUser()) {
  header("location: http://localhost/blog/admin/manage-users.php");  //TODO change url
  } else {
    echo json_encode(
      array('message' => 'User Not Deleted')
    );
  }