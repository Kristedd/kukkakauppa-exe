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

      return $rows;
    } else {
      die("0 rows");
    }
  }

  function getProduct($product_id, $published = 1){
    global $db;
    if(is_int(intval($product_id))){
      $sql_products_query = "SELECT * FROM `products` WHERE `id` = ? AND `published_status` = ?";
      $stmt = $db->prepare($sql_products_query);
      $stmt->bind_param('ii', $product_id, $published);
      $stmt->execute();
      $result = $stmt->get_result();


      if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $data['meta'] = $this->getProductMeta($data['id']);
        return $data;
      } else {
        echo "voi saatana";
        return false;
      }
    } else {
      echo "error";
      return false;
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
