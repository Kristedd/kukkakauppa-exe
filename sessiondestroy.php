<?php
session_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
session_destroy();
header('Location: .');
} else {
  header('Location: .');
}
?>
