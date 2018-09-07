<html>
	<head>
		<title>Gallery Page</title>
	</head>
	<body style="background-image:url('bg/bg3.jpg');background-position: 50% 50%;background-repeat: repeat;">
	<?php
	include_once('header.php');
	echo '<center><h1>Image Gallery</h1></center>';
	
	function showImages()
	{
		$out = '<ul class="thumbnails">';
		$out .= '';
		$folder = "img";
		$iterator = new DirectoryIterator( $folder);
		foreach ($iterator as $fileinfo) {
			if (!$fileinfo->isDot()) {
				$filename = $fileinfo->getFilename();
				$src = "$folder/$filename";
//				$out .= "<li><img src='$src' /></li>";
				$out .= "<li><a href='view.php?file=".$filename."'><img src='$src' /></a></li>";
			}
		}
		$out .= "</ul>";
		return $out;
	}
	
	$showImg = showImages();
	echo $showImg;
		
/*	$dir = "./img";
	$allFiles = scandir($dir);
	$files = array_diff($allFiles, array('.', '..')); // To remove . and .. 
	
	foreach($files as $file){
		echo "<a href='download.php?file=".$file."'>".$file."</a><br>";
	}*/
	?>	
<center><footer>
	<p>
		<?php 
			echo "<br><br>Copyright &copy; " . date("Y") . " Image Gallery"; 
		?>
	</p>
</footer></center>	
	</body>
</html>