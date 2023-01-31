<?php



// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


include_once '../../admin/config/database.php';
include_once '../../models/user.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

var_dump( json_encode(
    array($database)
));

$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->username = $data->username;
$user->email = $data->email;
$user->password = $data->password;
$user->avatar = $data->avatar;
$user->isAdmin = $data->isAdmin;

$user->create();
var_dump( json_encode(
    array($user)
));




if($user->create()) {
    echo json_encode(
      array('message' => 'User Created')
    );
} else {
    echo json_encode(
        array('message' => 'User Not Created')
    );
}

?>