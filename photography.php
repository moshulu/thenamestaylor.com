<?php
  session_start();
  include("conn.php");
 ?>

<!DOCTYPE HTML>
<html id = "photography">

  <head>
    <title>Taylor Dodge | Photography</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
<style>
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
</style>

	
<script>
function showImage() {
    document.getElementById("pic").style.display = "block";
}
</script>
	
  </head>
  <body>

	<header>
	    	<table>
	    		<tr class = "border_bottom">
	    			<td style = "width: 100%;"><p>Antarctic Field Technician</p></td>
	    			<td style = "padding: 25px; top: 0"><a href = "https://www.facebook.com/taylor.dodge.14"><img src = "pictures/fb_logo.png" style = "width: 25px; height: 25px;float: right"></a></td>
	    			<td style = "padding: 25px; top: 0"><a href = "www.linkedin.com/in/taylor-dodge-b97380b4"><img src = "pictures/linkedin_logo.png" style = "width: 25px; height: 25px; float: right"></a></td>
	    			<td style = "padding: 25px; top: 0"><a href = "https://www.instagram.com/ttaylorham/"><img src = "pictures/insta_logo.png" style = "width: 25px; height: 25px; float: right"></a></td>
	    		</tr>
	    	</table>
	    	<table>
	    		<tr class = "border_top">
			      <td id = "first" class = "headerLink" style = ""><a href = "index.php">Home</a></td>
			      <td class = "headerLink"><a href = "about.php">About</a></td>
			      <td class = "headerLink"><a href = "blog.php">Blog</a></td>
			      <td class = "headerLink"><a href = "photography.php">Photography</a></td>
			      <td class = "headerLink"><a href = "portfolio.php">Portfolio</a></td>
			      <td class = "headerLink"><a href = "contact.php">Contact</a></td>
		    	</tr>
	    	</table>
	    	<a href = "index.php"><img src="pictures/signature_white.png" style = "width: 15%; height: 10%; margin-left: 5%;"></a>

	</header>
	
	<h1>Photography</h1>
	<?php
		if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')){
		       }
		else if(isset($_SESSION['SESS_MEMBER_ID']) && (trim($_SESSION['SESS_MEMBER_ID']) == '8')){
			echo "<hr>";
			echo "<h1 style = \"font-size: 20px; padding: 0;\">EDIT MODE</h1>";
			
			//new album logic...
			echo "<h2 style = \"color: white; margin-bottom: 0\">NEW ALBUM</h2>";
			echo "<p id = \"text\" style = \"font-size: 15px; padding-left: 0;padding-bottom: 25px; margin: 0\">Enter your desired album name, choose your images (make sure they're not too big - they won't upload if they're too big!) and press \"Submit New Album.\"</p>";
		        
			echo "<form method=\"post\" action=\"newAlbum.php\" enctype=\"multipart/form-data\">";
			echo "<h5 style = \"color: white; margin: 0;\">Album Name: ";
			echo "<input type = \"text\" name = \"albumName\" required>";
			echo "<input style = \"margin-left: 10px;\" type=\"file\" name=\"fileToUpload[]\" id=\"fileToUpload\" multiple>";
			echo "<div id = \"selectedFiles\"></div>";
			
			echo "<script>";
				echo "var selDiv = \"\";";
				echo "document.addEventListener(\"DOMContentLoaded\", init, false);";
				    
				echo "function init() {";
					echo "document.querySelector('#fileToUpload').addEventListener('change', handleFileSelect, false);";
					echo "selDiv = document.querySelector(\"#selectedFiles\");";
				echo "}";
			        
			echo "function handleFileSelect(e) {";
				        
				echo "if(!e.target.files) return;";
					        
					echo "selDiv.innerHTML = \"\";";
						        
					echo "var files = e.target.files;";
					echo "for(var i=0; i<files.length; i++) {";
						echo "var f = files[i];";
						echo "var name = f.name;";
						echo "name = name.split(\".\");";
						echo "name = name[0];";
							            
						echo "selDiv.innerHTML += \"<p>\" + f.name + \" description:</p><input type = 'text' name =\" + name + \"_description";
						echo "><br>\";";
					
					echo "}";
				        
			echo "}";
			echo "</script>";
		        echo "<input style = \"margin-top:10px; margin-left:266px;\" type=\"submit\" name=\"submit\" value=\"Submit New Album\">";
			echo "</form>";
			
			//edit album logic...
			echo "<h2 style = \"color: white; margin-bottom: 0\">EDIT ALBUM</h2>";
			echo "<p id = \"text\" style = \"font-size: 15px; padding-left: 0;padding-bottom: 25px; margin: 0\">Listed are all the current albums, with the name of each image, it's current description. You have the ability to change the description, set it as a thumbnail, or delete it. To take action on an image, press the \"update\" button on the right of each image.</p>";
			echo "<p id = \"text\" style = \"font-size: 15px; padding-left: 0;padding-bottom: 25px; margin: 0\">You can also add images to an existing album! Click on \"Choose Files\" down at the bottom of the table, and choose your files. When  you're all done, press \"Add New Pictures.\"</p>";
			//select existing album
			if ($handle = opendir('uploads/')) {
			    $blacklist = array('.', '..', 'somedir', 'somefile.php');
			    
			    while (false !== ($album = readdir($handle))) {
			        if (!in_array($album, $blacklist)) {
			            echo "<h1 style = \"font-size: 30px;padding-top: 25px;\">$album</h1>";
				//echo "<form action = \"updateAlbumName.php\">";
					//echo "<h5 style = \"color: white;margin:0\">New Album Name:";
					//echo "<input type = \"hidden\" name = \"file_path\" value = \"uploads/$album\">";
					//echo "<input type = \"text\" name = \"newAlbumName\">";
					 //echo "<input type=\"submit\" name=\"submit\" value=\"Update\">";
				//echo "</form>";
					
					$dir = "uploads/$album/";
					
					// Open a directory, and read its contents
					if (is_dir($dir)){
					  if ($dh = opendir($dir)){
					  echo "<table id = \"text\" style = \"margin: 0;color: white; width: auto;float: none;\">";
					  echo "<thead><tr><td style = \"padding-left: 5px;padding-right:5px\">Name</td><td style = \"padding-left: 5px;padding-right:5px\">Current Description</td><td style = \"padding-left: 5px;padding-right:5px\">New Description</td><td style = \"padding-left: 5px;padding-right:5px\">Set as Thumbnail</td><td style = \"padding-left: 5px;padding-right:5px\">Delete?</td></tr></thead>";
					    while (($file = readdir($dh)) !== false){
					    	if(strpos($file, '.') !== (int) 0) {
					    		//create HTML table that's also a form. 5 columns: image name, image description, new description input, delete image checkbox, update button
					    		echo "<form method = \"post\" action = \"updateImage.php\" enctype=\"multipart/form-data\">";
						        echo "<tr>";
								//image name:
								echo "<input type = \"hidden\" name = \"file_path\" value = \"uploads/$album/$file\">";
								echo "<input type = \"hidden\" name = \"album\" value = \"uploads/$album\">";
								
								echo "<td><p style = \"padding: 0;text-align: none;margin:0;font-size: 10px;width: auto;\" id = \"text\">$file</p></td>";
								        
								//current image description:
								$mysqli = new mysqli("localhost","mattdrew", "Cinder1997!", "mattdrew");
								
								$query = "SELECT `image_desc` FROM `taylor_images` WHERE `image_path` = \"uploads/$album/$file\"";
								if ($result = $mysqli->query($query)) {
									$row = $result->fetch_assoc();
									$desc = $row["image_desc"];
									$result->free();
								}
								echo "<td>$desc</td>";
								        
								//new description input
								//$temp = explode(".", $file);
								echo "<td><input type = \"text\" name = \"";
								echo "newDescription\"</td>";
								
								echo "<td><input type = \"checkbox\" name = \"thumbnailCheckbox\" style = \"width:100%; margin: auto;\"></td>";
								        
								//delete image checkbox
								echo "<td><input type = \"checkbox\" name = \"deleteCheckbox\" style = \"width: 100%; margin: auto;\"></td>";
								        
								//update button
							        echo "<td><input action = \"updateImage.php\" type=\"submit\" name=\"submit\" value=\"Update\"></td>";
							echo "</tr>";
							echo "</form>";
						        
						    }
					      	else{
					      		continue;
					      	}
					    }
					    echo "</table>";
						echo "<form method=\"post\" action=\"newImages.php\" enctype=\"multipart/form-data\">";
						echo "<input type = \"hidden\" name = \"file_path\" value = \"uploads/$album/$file\">";
						echo "<h5 style = \"color: white; margin: 0;\">Add Pictures:";
						echo "<input type=\"file\" name=\"fileToUpload[]\" id=\"fileToUpload\" multiple>";
				
			       			echo "<input type=\"submit\" name=\"submitNewPictures\" value=\"Add New Pictures\">";
						echo "</form>";
					    closedir($dh);
					  }
					}
			        }
			    }
			    closedir($handle);
			}
			
			
			echo "<h2 style = \"color: white; margin-bottom: 0\">REMOVE ALBUM</h2>";
			echo "<p id = \"text\" style = \"font-size: 15px; padding-left: 0;padding-bottom: 25px; margin: 0\">Find the album you'd like to delete, and select \"Remove\" on the right. Be careful! This permanently deletes your album!</p>";
			//remove album logic...
			if ($handle = opendir('uploads/')) {
			    $blacklist = array('.', '..', 'somedir', 'somefile.php');
			    echo "<h6 style = \"font-size: 16px;\">Album Names:</h6>";
			    while (false !== ($album = readdir($handle))) {
			        if (!in_array($album, $blacklist)) {
			           echo "<table style = \"float: none;\">";
			           echo "<form action = \"removeAlbum.php\" method = \"post\" enctype=\"multipart/form-data\">";
			           	echo "<tr><td><h6>$album</h6></td>";
			           	
			           	echo "<td><input style = \"float:right;\" value = \"Remove\" type = \"submit\" name = \"remove\"></td>";
			           	echo "<td><input style = \"float:right;\" value = \"uploads/$album\" type = \"hidden\" name = \"yolo\"></td>";
			           	echo "</tr></form>";
			           echo "</table>";
			          
					
					

			        }
			    }
			    closedir($handle);
			}
			
			echo "</form>";
			
			
		}
	
	?>
	<hr>
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
		if ($handle = opendir('uploads/')) {
			    $blacklist = array('.', '..', 'somedir', 'somefile.php');
			    while (false !== ($album = readdir($handle))) {
			        if (!in_array($album, $blacklist)) {
			        	$dir = "uploads/$album/";
			        	
			        	echo "<h1 id = \"$album\" style = \"font-size: 30px; padding-top: 25px\">$album</h1>";
					
					// Open a directory, and read its contents
					if (is_dir($dir)){
					  if ($dh = opendir($dir)){
					  
					    echo "<div style = \"width: 75%; margin: auto;position: center;\">";
					    while (($file = readdir($dh)) !== false){
					    $file_name_extension = strstr($file, '.');
					    $file_name = strstr($file, '.', true);
					    $file_name = $file_name . $file_name_extension;
					    
					    	if((strpos($file, '.') !== (int) 0) && ($file_name == "thumbnail.png")) {
							$path = "uploads/$album/thumbnail.png";
							//echo "<div style = \"display: inline-block; margin: auto;\"><a href = \"$album.php\"><img style = \"vertical-align: middle; max-width: 100px; min-width: 100px; margin: auto;\"src = \"$path\"></div>";

						}
						if((strpos($file, '.') !== (int) 0) && $file_name !== "thumbnail.png") {
							$path = "uploads/$album/$file";
							echo "<div style = \"display: inline;top:0;margin: auto;max-width: 500px;min-width: 50px\"><img style = \"max-width: 500px;min-width: 50px\"src = \"$path\"/></div>";
						}
						}
						echo "<hr>";
					echo "</div>";
					}
					}

				}}
				
				
				}
		
	?>
	

	
	

	  <footer class = "footer" style = "position: fixed">
	  	    <p id = "links">
		      <a href = "index.php">Home</a>
		      <a href = "cookies.php">Cookies</a>
		      <a href = "terms.php">Terms and Conditions</a>
		      <a href = "map.php">Site Map</a>
		    
		      <?php
		        if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')){
		          echo "<a href = \"login.php\">Log In</a>";
		        }
		        else{
		         echo "<a href = \"logout.php\">Log Out</a>";
		        }
		      if(isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) != '')){
		        echo "<p class = \"text\" id = \"sessionWelcome\"> Welcome, {$_SESSION['SESS_FIRST_NAME']} {$_SESSION['SESS_LAST_NAME']}.</p>";
		      }
		     	?>
		    </p>
	      <p id = "copyright">
	        This website was written by Matt Drew. Copyright © 2017-2018.
	      </p>
	    </footer>

  </body>

</html>