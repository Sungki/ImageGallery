<html>
<?php
include "connect.php"; 

if(isset($_POST['submit']))
{
	$username = htmlspecialchars($_POST['username']);
	$email = $_POST['email'];
	$password = htmlspecialchars($_POST["password"]);

	$sql= "SELECT * FROM users WHERE username= '".$username."' and password ='". $password."';";
	$allResults= mysql_query($sql);
	$numrows= mysql_num_rows($allResults);
	If ($numrows > 0)
	{
		echo "This is the existing user: ".$username.".....";
	}
	else
	{
		$sqlinsert = "INSERT INTO users (username, email, password, usertype) values ('$username', '$email', '$password', 'member')";
		mysql_query($sqlinsert);
		header("location: index.php");
	}
}
?>

<body style="background-image:url('bg/bg2.jpg');background-position: 50% 50%;background-repeat: repeat;">
<?php
include_once('header.php');	
?>
<center><h1>Register to the member</h1></center>
<br><br>
<div class="container">
	<form method="post" action="">
		<label><b> User Id </b></label>
		<input type="text" name="username" placeholder="Enter username"/><br><br>
		<label><b> Password </b></label>
		<input type="text" name="password" placeholder="Enter Password"/><br><br>
		<label><b> Email </b></label>
		<input type="text" name="email" placeholder="Enter Email"/><br><br>
		<input type="submit" name="submit" value="Register" class="btn"/>
	</form>
</div>

<center><footer>
	<p>
		<?php 
			echo "<br><br>Copyright &copy; " . date("Y") . " Image Gallery"; 
		?>
	</p>
</footer></center>
</body>
</html>