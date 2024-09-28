<?php
// Include external configuration file
require_once "config/config.php";

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
  die("ERROR: Could not connect. " . $conn->connect_error);
}
?>
