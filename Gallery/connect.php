<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "gallery";
$conn=mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbname,$conn);
?>