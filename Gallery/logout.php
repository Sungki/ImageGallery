<?php
include_once('header.php');
session_unset($_SESSION);
session_destroy($_SESSION);
header("location: index.php");
?>