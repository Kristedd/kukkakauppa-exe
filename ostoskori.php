<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ostoskori</title>
  </head>
  <body>
    <!-- Header -->
  <?php
  include "menu.php";
  ?>
  <div id="ostoskori-main">
    <h1>Ostoskori</h1>
    <div class="ostos-tuote">
      <div class="ostos-kuva">
        <img src="" alt="kukka">
      </div>
      <div class="ostos-nimi">
        <p>foodelidoo </p>
      </div>
      <div class="ostos-hinta">
        <p>123,23€ </p>
      </div>
      <div class="ostos-buttons">
        <button class="button-x"></button>
      </div>
    </div>
  </div>

</div>
  </body>
</html>
