<?php
if(isset($_REQUEST['product_id']) && is_int(intval($_REQUEST['product_id']))){
  include "db.php";
  include "classes/producthandler.php";
  //mysqli_report(MYSQLI_REPORT_ALL);

  $dbhandler = new DatabaseHandler();
  $db = $dbhandler->connect();

  $producthandler = new ProductHandler();
  $pd = $producthandler->getProduct($_REQUEST['product_id']);
  if(!empty($pd)){
    $cart = [
      "products" => [
        "product_id" => 0,
        "quantity" => 1
      ]
    ]
    setcookie("cart", serialize($cart), time()+3600, "/");
    echo $_COOKIE["cart"];
  } else {
    echo json_encode(["errorCode" => 1, "errorMessage" => "Product not found"]);
  }

}

?>
