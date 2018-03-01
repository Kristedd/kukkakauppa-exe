<?php
include "db.php";
include "classes/producthandler.php";
//mysqli_report(MYSQLI_REPORT_ALL);

$dbhandler = new DatabaseHandler();
$db = $dbhandler->connect();

$producthandler = new ProductHandler();
$pd = $producthandler->getProducts(5, 0, 1, "name", "ASC");

echo "<pre>";
print_r($pd);
echo "</pre>";
?>
