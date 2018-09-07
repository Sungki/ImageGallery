<!DOCTYPE html>
<html>
<body style="background-image:url('bg/bg5.jpg');background-position: 50% 50%;background-repeat: repeat;">
<?php
include_once('header.php');	
?>
<form action="uploadProcess.php" method="post" enctype="multipart/form-data" class="container">
    <h2>Select image to upload:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
		<label><b>Title</b></label>
		<input type="text" name="title" placeholder="Enter Title"/><br><br>
		<label><b>Description</b></label>
		<input type="text" name="mydesc" placeholder="Enter Description"/><br><br>
		<label><b>Download Y/N</b></label><br>
		<input type="radio" name="status" value="0">Yes
		<input type="radio" name="status" value="1">No<br><br>
	<input type="submit" value="Upload Image" name="submit" class="btn">
</form>
<br><br>
<center><footer>
	<p>
		<?php 
			echo "<br><br>Copyright &copy; " . date("Y") . " Image Gallery"; 
		?>
	</p>
</footer></center>
</body>
</html>