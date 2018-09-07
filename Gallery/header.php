<head>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="register.php">Register</a>
  <a href="gallery.php">Gallery</a>
  <?php
	session_start();
	
	if(!isset($_SESSION['userid']))
	{
		$usertype="";
	}
	else
	{
		if($_SESSION['usertype']=='member')
			$usertype='member';
		else
			$usertype='guest';
	}
	if($usertype=='member')
		echo '<a href="upload.php">Upload</a>';
  ?>
  <a href="about.php">About</a>
  <?php
		if(isset($_SESSION['userid']))
			echo '<a href="logout.php" style="float:right">Log out</a>';
  ?>
</div>
  <?php
		if($usertype!="member")
			echo '<br><p style="color:blue;font-size: 20px;">You are a guest(not logged in).......</p>';
		else
			echo '<br><p style="color:blue;font-size: 20px;">Welcome '.$_SESSION['userid'].'... Type: '.$_SESSION['usertype'].'</p>';
  ?>
</body>