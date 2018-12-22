<?php
  session_start();
 ?>

<!DOCTYPE html>
<html id = "newJournalEntry">
  <head>
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
	<title>Taylor Dodge | New Blog Post</title>
	<link rel = "stylesheet" type = "text/css" href = "style.css" />
	<script type="text/javascript" src="entryRewrite.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>
  <body>
    
	<?php
		if($_SESSION["SESS_MEMBER_ID"] == "8"){
			echo "<h3 class = \"text\" style = \"margin:auto; width: 50%;color: white;margin-top: 5%; text-align: center\">New Blog Post</h3>

    <form action = \"entryAction.php\" method = \"POST\" class = \"text\">
    <input type=\"hidden\" id = \"finalPost\" name=\"finalPost\" value=\"\">
    	<table style = \"padding:0;margin:auto;float: none;width: 25%;\">
    		<tr>
    			<td style = \"width: 300px; text-align: left;\"><p>Title</p><input type = \"text\" name = \"title\"></input></td>
    			<td style = \"float: right;\"></td>
    		</tr>
    		<tr><td><p>Blog Post</p></td></tr>
    		<tr>
    			<td colspan = \"2\"><textarea onkeydown=\"if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}\" name = \"body\" style = \"min-width:500px; min-height: 500px\" id = \"myTextArea\" required></textarea></td>
    			
    		</tr>
    		<tr>
    			<td colspan = \"2\"><button style = \"display: block;float: right;\" type=\"submit\" onclick=\"readTextArea()\">Submit</button></td>
			
    		</tr>
    	</table>
      
    </form>";
		}
	else{
		header("Location: index.php");
	}
	?>


  </body>
