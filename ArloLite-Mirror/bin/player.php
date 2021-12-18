<?php
	
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Content-Type: video/mp4");
	header("Content-Disposition: inline; filename=".$_GET['path'].";");
	header("Content-Length: ".strlen(file_get_contents($_GET['path'])));
	print(file_get_contents($_GET['path']));
?>
