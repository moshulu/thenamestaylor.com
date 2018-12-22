<?php
  session_start();
  include("conn.php");
 ?>

<!DOCTYPE HTML>
<html id = "blog">

  <head>
    <title>Taylor Dodge | Blog</title>
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
	
	<div class="dropdown">
	  <button class="dropbtn">Archive</button>
	  <div class="dropdown-content">
	  	<?php
	  		mysqli_select_db($link, "mattdrew") or die("could not select db");
	  		
	  		$qryTotalLetters = "SELECT * FROM `taylor_blog`";
			$resultTotalLetters = mysqli_query($link, $qryTotalLetters);
			$rows = mysqli_num_rows($resultTotalLetters);
			
			for($x = 1; $x <= $rows; $x++){
				$qry = "SELECT `title` FROM `taylor_blog` WHERE `post_id` = $x";
				$resultLetter = mysqli_query($link, $qry);
				$row = mysqli_fetch_assoc($resultLetter);
				
				$title = $row["title"];
				
	  			echo "<a href=\"#$title\">$title</a>";
	  		}
	  	?>
	  </div>
	</div>
	
	<h1>Blog</h1>
	<?php 
		if(isset($_SESSION['SESS_MEMBER_ID']) && (trim($_SESSION['SESS_MEMBER_ID']) == '8')){
	
	
	echo "<a href = \"newJournalEntry.php\"><h1 style = \"color: #00a3a3; text-decoration: underline;font-size: 20px;padding: 0;float: left\">New Blog Post</h1></a>";
	} ?>
	<?php
		mysqli_select_db($link, "mattdrew") or die("could not select db");
		
		$qryTotalLetters = "SELECT * FROM `taylor_blog`";
		$resultTotalLetters = mysqli_query($link, $qryTotalLetters);
		$rows = mysqli_num_rows($resultTotalLetters);
		
		for($x = $rows; $x > 0; $x--){
			$qry = "SELECT * FROM `taylor_blog` WHERE `post_id` = $x";
			$resultLetter = mysqli_query($link, $qry);
			$row = mysqli_fetch_assoc($resultLetter);
			
			$title = $row["title"];
			$body = $row["body"];
			$date = $row["date"];
			$location = $row["location"];
			
			#start entry...
			echo "<div class = \"entry\" id = \"$title\">";
				echo "<table>";
					echo "<tr>";
						echo "<td>";
						echo "<h3>$title</h3>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
						echo "<p>$body</p>";
					echo "</tr>";
				echo "</table>";
				echo "<p class = \"signOff\" style = \"font-size: 30px; padding-left: 75%\">";
					echo "- Taylor";
				echo "</p>";
			echo "</div>";
			echo "<br>";
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