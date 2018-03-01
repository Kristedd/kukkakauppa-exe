<?php
session_start(); // Starts session.

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) { //checks if you have valid session.
  header('Location: .'); //Opens homepage.
  exit; //id session End code here.
}

$error = false; //error checking

//checks if username and password are not empty.
if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {

  require_once 'db.php';              //establishes server connection...

  /* $_GET */

  $dbhandler = new DatabaseHandler();
  $db = $dbhandler->connect();

  if(empty($db)) {
    die("connection error.");   //if connection is not available give error and end code.

  }

  $login_username = $db->real_escape_string(strip_tags($_POST['username'])); //makes sure inputs are not HACKERS
  $login_password = $db->real_escape_string(strip_tags($_POST['password']));

  $sql = "SELECT id, password FROM users WHERE users.username = ?"; //sqli magic

  $stmt = $db->prepare($sql); //
  $stmt->bind_param('s', $login_username);

  $stmt->execute();

  $result = $stmt->get_result();

  //$stmt->bind_result($password_hash);

  if ($result->num_rows == 1) {
    $result_array = $result->fetch_array(MYSQLI_NUM);

    $user_id = $result_array[0];
    $password = $result_array[1];

    //$password_hash = password_hash($login_password, PASSWORD_DEFAULT);

    if (password_verify($login_password, $password)) {
        echo 'Password is valid!';
        $_SESSION['user_id'] = $user_id;
        $dbhandler->close();
        header('Location: .');
        exit;
    } else {
        $error .= "väärä salasana <br>" . $password_hash . "<br>" . $password;

    }
  } else {
      $error .= "Käyttäjänimeä ei löydy. <br>";
  }
}/* else {
  echo "formin dataa ei tullut";
  print_r($_POST);
}*/

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Etusivu</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menubar.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <!-- Header -->

  <?php
  include "menu.php";
  //'foo $bar' -> foo $bar"asd"
  //"foo $bar" -> foo ES

  ?>

  <div id="login-main">
    <h1>Kirjaudu</h1>
    <?php
    if($error){
    echo "<div id=\"errormsg\"> $error </div>";
      }
     ?>
    <form action="" method="post">
      Käyttäjänimi<br>
      <input type="text" name="username"><br>
      Salasana<br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Kirjaudu">
    </form>
  </div>
