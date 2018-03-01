<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) {
  header('Location: .');
  exit;
}

$error = "";

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){

  require_once 'db.php';

  $dbhandler = new DatabaseHandler();
  $db = $dbhandler->connect();

  if(empty($db)) {
    die("connection error.");
  }

  $register_username = $db->real_escape_string(strip_tags($_POST['username']));
  $register_password = $db->real_escape_string(strip_tags($_POST['password']));
  $register_email = $db->real_escape_string(strip_tags($_POST['email']));

  require_once "classes/userhandler.php";

  $userhandler = new UserHandler();

  $new_user_id = $userhandler->create_user($db, $register_username, $register_email, $register_password, 0);

  if($new_user_id){
    $_SESSION['user_id'] = $new_user_id;
    header('Location: .');
    exit;
  } else {

    $error .= var_dump($db->error);
  }
}

 ?>
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

  <?php include "menu.php"; ?>

  <div id="register-main">
    <h1>Rekisteröidy</h1>
    <?php
    if($error){
      echo "<div id=\"errormsg\"> $error </div>";
    }
    ?>
    <div id="register-form">
      <form action="" method="post">
      <label for="username"> Käyttäjätunnus:</label><br>
      <input id="username" type="text" name="username" ><br><br>

      <label for="email"> Sähköposti osoite:</label><br>
      <input id="email" type="text" name="email"><br><br>

      <label for="password"> Salasana:</label><br>
      <input id="password" type="password" name="password"><br><br>

      <label for="passwordagain"> Salasana uudelleen:</label><br>
      <input id="passwordagain" type="password" name="passwordagain"><br><br>

      Hyväksyn käyttöehdot:
       <input type="checkbox"><br><br>

      <input type="submit" value="Rekisteröidy">
    </form>
  </div>

  </div>
