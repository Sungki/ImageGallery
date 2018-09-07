<html>
	<head>
		<title>Gallery Page</title>
	</head>
	<body style="background-image:url('bg/bg6.jpg');background-position: 50% 50%;background-repeat: repeat;">
	<?php
	include('connect.php');
	include_once('header.php');
	echo '<center><h1>Image View</h1>';
	$file = basename($_GET['file']);
	$target_dir = "img/";
	$target_file = $target_dir . $file;	
	$out = "<img src='$target_file' width='800' height='400'/>";
	
	
	$sql= "SELECT * FROM image WHERE filename= '".$file."';";
	$allResults= mysql_query($sql);
	
	if (!$allResults) {
    echo "<p?DB Error, could not query the database<br>";
    echo 'MySQL Error: ' . mysql_error().'</p>';
    exit;
	}


	while($row = mysql_fetch_assoc($allResults))
	{
		$title = $row['title'];
		$desc = $row['mydesc'];
		$status = $row['status'];
	}	
	
	$out .= "<p><h3>$title</h3>$desc</p><br>";
	//$out .= "<li><a href='view.php?file=".$filename."'><img src='$src' /></a></li>";
	//<a href='download.php?file=".$file."'>".$file."</a>

	if($usertype=="member"&&$status==0)
		$out .= "<a href='download.php?file=".$file."'><input type='image' src='bg/download.jpg'></a></center>";

	echo $out;
	?>
<center><footer>
	<p>
		<?php 
			echo "<br>Copyright &copy; " . date("Y") . " Image Gallery"; 
		?>
	</p>
</footer></center>	
	</body>
</html>