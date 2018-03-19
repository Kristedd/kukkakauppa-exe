<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Ota yhteyttä</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menubar.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/otayhteytta.css">
</head>  <link rel="stylesheet" type="text/css" href="css/scrollingimage.css">
<body>
  <!-- Header -->

  <?php
  include "menu.php";

  ?>

  <!-- main page -->
  <div id="otayhteytta-main">
    <h1>Ota yhteyttä</h2>
      <div id="lomake">
        <p>Voit ottaa meihin yhteyttä<br> * puhelimitse yksittäisiin myymälöihin<br>* sähköpostitse: asiakaspalvelu@puutarhaliikeneilikka.fi<br>* alla olevalla lomakkeella</p> <br><br>
        Nimi:<br> <input type="text" name="nimi" v><br><br>
        Sähköposti:<br> <input type="email" name="sposti"><br><br>
        Aihe:
        <select>
        <option value="kysymystuotteista">Kysymys tuotteista</option>
        <option value="tilaus">Tilaus</option>
        <option value="yhteydenottopyymto">Yhteydenottopyyntö</option>
        <option value="muu">Muu</option>
      </select><br><br>
         Viestisi: <br><textarea name="palaute"></textarea><br><br>
         Haluan tilata Puutarhaliike Neilikan uutiskirjeen: <input type="checkbox"><br><br>
         <input type="submit" value="Lähetä">
    </div>
  </div>
  <!-- Footer -->
  <div id="footer">


  </div>
</body>
</html>
