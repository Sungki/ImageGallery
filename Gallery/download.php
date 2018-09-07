<?php
$file = basename($_GET['file']);
$target_dir = "img/";
$target_file = $target_dir . $file;
$ext = strtolower($path_parts["extension"]);

switch ($ext) {
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
}
	
if (file_exists($target_file)) 
{	 
     header('Pragma: public');
     header('Expires: 0');
     header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	 header("Cache-Control: private",false);
     header('Content-Type: $ctype');
     header('Content-Disposition: attachment; filename="'.basename($target_file).'"');
	 header("Content-Transfer-Encoding: binary");
     header('Content-Length: ' . filesize($target_file));
	 ob_clean();
     flush();
     readfile($target_file);
     exit;
}
else
{
	echo '<br><br>Cannot find the file.';
}
?>