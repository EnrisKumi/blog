<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;

$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->username = $data->username;
$user->email = $data->email;
$user->password = $data->password;
$user->avatar = $data->avatar;
$user->isAdmin = $data->isAdmin;

if($user->updateUser()) {
    echo json_encode(
      array('message' => 'User Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'User Not Updated')
    );
  }