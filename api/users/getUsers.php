<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

$result = $user->getUsers();

$rows = $result->rowCount();

if ($rows > 0) {
    $usersArray = array();

    while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($rows);

        $userItem = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'avatar' => $avatar,
            'isAdmin' => $isAdmin,
        );

        array_push($usersArray, $userItem);
    }
    echo json_encode($usersArray);
} else {
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}
