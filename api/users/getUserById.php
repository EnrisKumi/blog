<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die();

$user->getUserById();

$userArray = array(
    'id' => $user->id,
    'firstname' => $user->firstname,
    'lastname' => $user->lastname,
    'username' => $user->username,
    'email' => $user->email,
    'password' => $user->password,
    'avatar' => $user->avatar,
    'isAdmin' => $user->isAdmin,
);

print_r(json_encode($userArray));