<?php
  session_start();
 ?>

<!DOCTYPE HTML>
<html id = "login">

  <head>
    <title>Taylor Dodge | Login</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
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
			      <td class = "headerLink"><a href = "research.php">Research</a></td>
			      <td class = "headerLink"><a href = "portfolio.php">Portfolio</a></td>
			      <td class = "headerLink"><a href = "contact.php">Contact</a></td>
		    	</tr>
	    	</table>
	    	<a href = "index.php"><img src="pictures/signature_white.png" style = "width: 15%; height: 10%; margin-left: 5%;"></a>

	</header>
	
	<h1>Login</h1>
	<div class = "loginTable" style = "padding-top: 200px; margin: auto; width: 50%">
		<table style = "border: 1px solid white;float: none; margin: auto; width: 50%;">
			<form action = "loginAction.php" method = "POST">
				 <tr>
				 	<td id = "text" style = "padding: 0;">Username:</td>
				   	<td id = "text" style = "padding: 0;">Password:</td>
				 </tr>
				 <tr>
					 <td><input type="text" name="username" required></td>
					 <td><input type="password" name="password" required></td>
				 </tr>
				<tr>
					
						<td></td>
						<td><button type="submit" name="submitButton" href = "loginAction.php" style = "float: none;margin: 0; padding: 0;">Submit</button></td>
					
				</tr>
			</form>
		</table>
	</div>

	
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