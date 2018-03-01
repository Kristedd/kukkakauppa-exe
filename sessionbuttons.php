<?php

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ) {
  echo "<div id=\"login\">
  <ul>
  <li> <a href=\"sessiondestroy.php\">Kirjaudu ulos</a> </li>
";
} else {
  echo "<div id=\"login\">
  <ul>
  <li> <a href=\"login.php\">Kirjaudu</a> </li>
  <li> <a href=\"register.php\">Rekisteröidy</a> </li>
  ";
}
?>
