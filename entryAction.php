<?php
  session_start();

  include("conn.php");							// include our connection link
  mysqli_select_db($link, "mattdrew") or die("could not select db");	// select correct database after initial link
  
  $title = $_POST[title];						
  $body = $_POST[finalPost];
  
  echo $body;
  
  $query = "SELECT * FROM `taylor_blog`";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);

  #need this to increment mem_id
  $qryHighestMember = "SELECT `post_id` FROM `taylor_blog` ORDER BY `post_id` DESC LIMIT 1";
  $resultHighestMember = mysqli_query($link, $qryHighestMember);
  $rowHighestMember = mysqli_fetch_assoc($resultHighestMember);
  $highestLetterID = $rowHighestMember["post_id"];
  $highestLetterID = $highestLetterID+1;

      $creationQuery = "INSERT INTO `taylor_blog`(`post_id`, `title`, `body`) VALUES ($highestLetterID, \"$title\", \"$body\")";
      $creationResult = mysqli_query($link, $creationQuery);
      if($creationResult){
        echo"creation success!";
        
      }
      else{
        echo "something went wrong...";
        echo "highest letter id: $highestLetterID";
        echo "\"$title\"";
        echo "\"$body\"";
        
      }
  
  
  header("Location: blog.php");
  
?>