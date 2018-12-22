<?php
	include("conn.php");
	
	/***
	First, upload to the /uploads/[albumName] directory.
	At the same time, 
	***/
	$target_dir = "uploads/$_POST[albumName]";
	echo "target: $target_dir";
	if(mkdir("$target_dir", 0755)) echo "directory listing successful!";
	
	$count = 0;
	while(true){
		if($_FILES['fileToUpload']['size'][$count]>0) $count++;
		else break;
	}
	
	echo "count: $count <br>";
	
	for($x = 0; $x<$count; $x++){
		//pull image name, description, pathfrom html
		$imageFullName = $_FILES['fileToUpload']['name'][$x];
		$imageName = explode(".",$imageFullName);
		$desc = $imageName[0] . "_description";
		$fullDescription = $_POST[$desc];
		echo "<br>desc: $fullDescription<br>";
		
		$path = $target_dir . "/" . $_FILES['fileToUpload']['name'][$x];
	        $name = $_FILES['fileToUpload']['name'][$x];
	        
	       //make sure  you have connection to database...
	       $mysqli = new mysqli("localhost","mattdrew", "Cinder1997!", "mattdrew");
	        if($mysqli){
	        	//echo "connection successful";
	        }
		
		//put in database
		$query = "SELECT `image_id` FROM `taylor_images` ORDER BY `image_id` DESC LIMIT 1";
		if ($result = $mysqli->query($query)) {

		    while ($row = $result->fetch_assoc()) {
		        $id = $row["image_id"];
		        $id +=1;
		    }
		    echo $id;
		    
		    $result->free();
		}
		//begin inserting into table
		$insertQuery = "INSERT INTO `taylor_images`(`image_id`, `image_path`, `image_name`, `image_desc`) VALUES ($id,'$path','$name','$fullDescription')";
		if ($resultCreation = $mysqli->query($insertQuery)) {
		    echo "creation success.";
		}
		else{
			echo "something went wrong here.";
		}
		
		//upload pictures to correct album directory...
		$target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"][$x]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		       //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$x], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"][$x]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
	
	//header("Location: photography.php");


?>