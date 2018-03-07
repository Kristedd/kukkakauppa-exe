<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <title>Tuotteet</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/menubar.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <!-- Header -->

  <?php
  include "menu.php";
  include "db.php";
  include "classes/producthandler.php";
  ?>

  <!-- main page -->
  <div id="side-bar">
    <ul>
      <li> <a href="sisakasvit.html">Sisäkasvit</a></li>
      <li> <a href="ulkokasvit.html">Ulkokasvit</a></li>
      <li> <a href="tyokalut.html">Työkalut</a></li>
      <li> <a href="kasvienhoito.html">Kasvienhoito</a></li>
      </ul>
  </div>
  <div id="tuote-main">
    <div id="header">
    <h1>Tuotteet</h1>
  </div>
  <div class="tuotteet">

<?php
$dbhandler = new DatabaseHandler();
$db = $dbhandler->connect();

$producthandler = new ProductHandler();
$pd = $producthandler->getProducts(5, 0, 1, "name", "ASC");

foreach ($pd as $product){
  ?>
    <div class="tuote">
      <div class="kuva">
        <img src=" <?= $product["meta"][1]; ?>" alt="kuva">
      </div>
      <div class="nimi">
        <a href=""> <?= $product["name"]; ?></a>
      </div>
      <div class="hinta">
        <p> <?= $product["price"]; ?></p>
      </div>
    </div>
  <?php
}

?>
</div>

  </div>
  <!-- Footer -->
  <div id="footer">


  </div>
</body>
</html>
