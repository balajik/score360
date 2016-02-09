<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scores";
$conn = mysql_connect($servername, $username, $password, $dbname);
mysql_select_db($dbname);

if(!$conn)
{
  echo "connection failed";
  die('could not connect:' . mysql_error());
}
?>