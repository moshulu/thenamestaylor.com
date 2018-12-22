<?php
	$mysqli = new mysqli("localhost","mattdrew", "Cinder1997!", "mattdrew");
	
	$delete = $_POST[deleteCheckbox];
	if($delete == true){
		echo "we're deleting.";
		$deleteQuery = "DELETE FROM `taylor_images` WHERE `image_path` = \"$_POST[file_path]\"";
		echo "<br>deleteQuery: $deleteQuery<br>";
		if ($result = $mysqli->query($deleteQuery)) {
			echo "deleted.";
			
		}
		if(is_file($_POST[file_path])){
			unlink($_POST[file_path]);
			echo "unlinked.";
		}
		header("Location: photography.php");
	}
	
	$thumb = $_POST[thumbnailCheckbox];
	$file_path = $_POST[file_path];
	$thumb_path = $_POST[album] . "/thumbnail.png";
	if($thumb == true){
		echo "setting $file_path as thumbnail at $thumb_path";
		if(copy($file_path, $thumb_path)){
			echo "success setting thumbnail.";
		}
		else{
			$myfile = fopen("$file_path", "r") or die("Unable to open file!");
		}
		
	}
	
	$newDescription = $_POST[newDescription];
	if($newDescription != null){
		echo "it has a new description!";
		$updateDescriptionQuery = "UPDATE `taylor_images` SET `image_desc` = \"$newDescription\" WHERE `image_path` = \"$_POST[file_path]\"";
		if ($result = $mysqli->query($updateDescriptionQuery)) {
			echo "updated!";
			header("Location: photography.php");
		}
	}
	
	header("Location: photography.php");

?>