<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'uldx2rdrq1961');
define('DB_PASSWORD', '2*b4$4p^J77C');
define('DB_NAME', 'dbwj91w5ax4h9o');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>