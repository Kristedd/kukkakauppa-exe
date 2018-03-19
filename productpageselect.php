<?php
if(isset($_REQUEST['id']) && is_int(intval($_REQUEST['id']))){
  include "db.php";
  include "classes/producthandler.php";
  //mysqli_report(MYSQLI_REPORT_ALL);

  $dbhandler = new DatabaseHandler();
  $db = $dbhandler->connect();

  $producthandler = new ProductHandler();
  $pd = $producthandler->getProduct($_REQUEST['id']);

  }
  else {
    die;
  }
  ?>
