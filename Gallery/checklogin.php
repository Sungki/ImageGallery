<?php
session_start();
include "connect.php"; 
include_once('header.php');

if(isset($_POST['userID']))
{
	$userID= htmlspecialchars($_POST["userID"]);
	$password = htmlspecialchars($_POST["password"]);
	$sql= "SELECT * FROM users WHERE username= '".$userID."' and password ='". $password."';";
	$allResults= mysql_query($sql);
	$numrows= mysql_num_rows($allResults);
	If ($numrows > 0)
	{
		$record = mysql_fetch_assoc ($allResults);
		$_SESSION['userid'] = $record ['username'];
		$_SESSION ['usertype'] = $record ['usertype'];
		header ("location: index.php");
	}
	else
	{
		header ("location: index.php");
	}
}