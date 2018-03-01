<?php
class UserHandler {

/*   function __construct($edible, $color="green")
   {
       $this->edible = $edible;
       $this->color = $color;
   }
*/
   function create_user($db, $username, $email, $password, $type) {
     $sql = "INSERT INTO users (username, email, password, type, created) VALUES (?, ?, ?, ?, NOW())";

      if (!($stmt = $db->prepare($sql))) {
       echo "Prepare failed: (" . $db->errno . ") " . $db->error;
       return false;
      }

      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      if (!$stmt->bind_param("sssi", $username, $email, $password_hash, $type)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;

        return false;
      }

      if ($stmt->execute()) {

        if (is_int($db->insert_id)) {
          return $db->insert_id;
        } else {
          echo "insert_id not int";
          return false;
        }
      } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        return false;
      }
   }
}

?>
