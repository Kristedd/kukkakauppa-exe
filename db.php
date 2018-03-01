<?php
class DatabaseHandler {
  var $dbhost = "localhost";
  var $dbname = "kukkakauppa";
  var $dbuser = "kukkakauppa";
  var $dbpass = "kukkakauppa";
  var $db = null;

  function connect() {
    $db = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

    if (!$db->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $db->error);
        return false;
    }

    if ($db->connect_errno) {

      echo "Error: Failed to make a MySQL connection, here is why: \n";
      echo "Errno: " . $db->connect_errno . "\n";
      echo "Error: " . $db->connect_error . "\n";

      return false;
    }
    $this->db = $db;
    return $this->db;
  }

  function close() {
    $this->db->close();
    return true;

  }
}
