<?php
include "db.php";
include "classes/producthandler.php";
//mysqli_report(MYSQLI_REPORT_ALL);

$dbhandler = new DatabaseHandler();
$db = $dbhandler->connect();

$producthandler = new ProductHandler();
$pd = $producthandler->getProducts(5, 0, 1, "name", "ASC");

function loadProducts(){
  global $pd;
  foreach ($pd as $product){
    ?>
          <div class="tuote">
          <div class="kuva"> <img src=" <?= $product["meta"][1]; ?>" alt="kuva"></div>
          <div class="nimi"> <a href=""><?= $product["name"]; ?></a> </div>
          <div class="hinta"> <p><?= $product["price"]; ?></p></div>
    <?php
      }
    }
?>
