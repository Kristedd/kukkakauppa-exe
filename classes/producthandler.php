<?php
class ProductHandler {
  /*
  Returns product data in array
  */
  function getProducts($amount, $category_id, $published, $orderby = "name", $order = "ASC"){
    global $db;
    $limit = "";
    if ($amount != 0 && is_int($amount)){
      $limit = " LIMIT " . $amount;
    }
    $sql_products_query = "SELECT * FROM `products` WHERE `published_status` = ? ORDER BY ? " . $order . $limit;
    $sql = "SELECT * FROM `products`";

    $stmt = $db->prepare($sql_products_query);

    $stmt->bind_param('is', $published, $orderby);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $rows = [];

      while($row = $result->fetch_assoc()) {
          $row['meta'] = $this->getProductMeta($row['id']);
          $rows[] = $row;
      }

      print_r($this->getProductMeta(1, 0));
      return $rows;
    } else {
      die("0 rows");
    }
  }

  private function getProductMeta($product_id) {
    global $db;
    $sql = "SELECT * FROM `products_meta` WHERE `product_id` = ?";

    $stmt = $db->prepare($sql);

    $stmt->bind_param('i', $product_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $rows = [];

      while($row = $result->fetch_assoc()) {
          $rows[$row['meta_type']] = $row['meta_value'];
      }

      return $rows;
    } else {
      return null;
    }
  }
}

?>
