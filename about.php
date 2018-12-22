<?php
  session_start();
 ?>

<!DOCTYPE HTML>
<html id = "about">

  <head>
    <title>Taylor Dodge | About</title>
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
	
	<h1>ABOUT</h1>
	<div style = "padding-bottom: 10%;">
		<p id = "text">Hi, my name is Taylor.</p>
		<br>
		<p id = "text">I grew up in Woodstown New Jersey, home of the Cowtown Rodeo, is where I spent my childhood before moving up north to the very diverse and integrated Rutgers University community. I developed a love for the sciences and the ocean as a freshman in high school after watching the late Rob Stewarts documentary, "Shark Waters." I've been hooked ever since.</p>
		<br>
		<p id = "text">At Rutgers, I studied Marine Biology in the School of Environmental and Biological Sciences. I recently took up a minor in Environmental Policy, Institutions and Behavior (EPIB) looking to expand my horizons and develop an understanding of politics in a way I could appreciate and comprehend. I realized later on my deep passion for being outdoors and the need for an understanding of environmental interactions beyond biology. I decided to switch my major from Marine Biology to Ecology Evolution and Natural resources and haven't looked back since. </p>
		<br>
		<p id = "text">I have worked in many different subjects and have been exposed to a variety of courses giving me invaluable experiences in the field and in the classroom. I have been working in the lab of Paul Falkoswki for three years, and have done research in Woods Hole, MA. In addition, I will be traveling to Antartica in the Spring of 2017 to study phytoplankton as part of a long term ecological research incentive. </p>
		<br>
		<p id = "text">Beyond my studies, some of my many hobbies include hiking, traveling, and anything that gets me outdoors. I am an avid reader and lover of Lord of the Rings and a plethora of other fiction novels. I am also  volunteer fireman at East Franklin Volunteer Fire Department where I have been an active member for 2 years. I also am involved in The Trail, a student run environmental newsletter where I act as a writer and graphic designer.</p>
		<br>
		<p id = "text">After college, I plan on enlisting in the United States Navy before deciding on graduate school. In my future, I hope to be able to bridge the disconnect between science and politics to help create a more efficient system and a better understanding of conservation ecology. I want to increase the understanding and comprehension of conservation within politics to help create a more sustainable future.</p>
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