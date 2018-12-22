<?php
	$mysqli = new mysqli("localhost","mattdrew", "Cinder1997!", "mattdrew");
	
	$path = $_POST[yolo];
	echo $path;
	$deleteQuery = "DELETE FROM `taylor_images` WHERE `image_path` REGEXP \"$path/*\"";
		echo "<br>deleteQuery: $deleteQuery<br>";
		if ($result = $mysqli->query($deleteQuery)) {
			echo "deleted.";
			
		}
		$files = glob($path . '/*');
		foreach ($files as $file) {
			is_dir($file) ? removeDirectory($file) : unlink($file);
		}
		rmdir($path);
	 	
	header("Location: photography.php");
?>