<?php
include "connect.php"; 
include_once('header.php');	

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<br><br>File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br><br>File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "<br><br>Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<br><br>Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<br><br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<br><br>Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
        echo "<br><br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$cur_date=date("Y-m-d");
		$file_name = $_FILES["fileToUpload"]["name"];
		$title = $_POST["title"];
		$mydesc = $_POST["mydesc"];
		$status = $_POST["status"];
		$sqlAddImage = "INSERT INTO image (filename, title, mydesc, uploadon, status) VALUES ('$file_name', '$title', '$mydesc', '$cur_date', '$status')";		
		if(!mysql_query($sqlAddImage)) 
		{
			echo"<br><br>fail.".mysql_error();
		} 
		else 
		{
			echo"<br><br>$cur_date<br>$file_name<br>succeed.";
		}
    } else {
        echo "<br><br>Sorry, there was an error uploading your file.";
    }
}
?>