<?php
  session_start();
 ?>

<!DOCTYPE HTML>
<html id = "emailSuccess">

  <head>
    <title>Taylor Dodge | Contact Me</title>
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
	    			<td style = "width: 100%;"><p>Antarctic Ecological Researcher</p></td>
	    			<td style = "padding: 25px; top: 0"><a href = "https://www.facebook.com"><img src = "pictures/fb_logo.png" style = "width: 25px; height: 25px;float: right"></a></td>
	    			<td style = "padding: 25px; top: 0"><a href = "https://www.linkedin.com"><img src = "pictures/linkedin_logo.png" style = "width: 25px; height: 25px; float: right"></a></td>
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
	
	<h1>Your email was a success!</h1>
	<p id = "text">I'll be sure to contact you soon. Thank you!</p>

	
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