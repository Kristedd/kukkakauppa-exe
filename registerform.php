<?php
require_once 'db.php';
session_start();

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) {
  header('Location: .');
  exit;
}

if(isset($_POST['username']) && $_POST['email']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

$dbhandler = new DatabaseHandler();
$db = $dbhandler->connect();

if(empty($db)) {
  die("connection error.");
}

$register_username = $db->real_escape_string(strip_tags($_POST['username']));
$register_password = $db->real_escape_string(strip_tags($_POST['password']));
$register_email = $db->real_escape_string(strip_tags($_POST['email']));

$userhandler = new UserHandler();

if($new_user_id = $userhandler->create_user($db, $username, $email, $password, 0)){
  $_SESSION['user_id'] = $new_user_id;
} else {
  $error .= "Rekisteröinti epeäonnistui";
}
}


?>
