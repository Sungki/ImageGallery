<html>
<body style="background-image:url('bg/bg1.jpg');background-position: 50% 50%;background-repeat: repeat;">
<?php
	include "connect.php";
	include_once('header.php');
?>
<center><div style="padding-left:20px">
  <h1>Welcome to Choi's Image Gallery</h1>
   <?php
		if($usertype!="member")
			echo "<h3>In order to login, you must register</h3>";
   ?>
</div></center>

<section>
<form action= "checklogin.php" method="post" class="container">
	<h1>Login</h1>
	<label><b> User Id </b></label>
	<input type="text" placeholder="Enter username" name="userID" required>
	<label><b> Password </b></label>
	<input type="password" placeholder="Enter Password" name="password" required>
	<br><br>
	<button type="submit" class="btn">Login</button>
</form>
</section>

<center><footer>
	<p>
		<?php 
			echo "<br><br>Copyright &copy; " . date("Y") . " Image Gallery"; 
		?>
	</p>
</footer></center>

</body>
</html>