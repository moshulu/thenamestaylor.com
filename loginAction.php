<?php
  session_start();

  include("conn.php");					// include our connection link
  mysqli_select_db($link, "mattdrew") or die("could not select db");	// select correct database after initial link
  
  $username = $_POST[username];						// set initial values needed to verify account
  $password = $_POST[password];
  
  $qry = "SELECT * FROM `user/pass`";
  $result = mysqli_query($link, $qry);
  $rows = mysqli_num_rows($result);
  
  for($x = 0; $x < $rows; $x++){
  	$qryMember = "SELECT `username`, `password` FROM `user/pass` WHERE `mem_id` = $x";
  	$resultMember = mysqli_query($link, $qryMember);
  	$row = mysqli_fetch_assoc($resultMember);
  	if($row["username"] == $username){
  		if($row["password"] == $password){
	  		$qryFName = "SELECT `fname` FROM `user/pass` WHERE `username` = \"$username\"";
	  		$qryLName = "SELECT `lname` FROM `user/pass` WHERE `username` = \"$username\"";
	  		$qryID = "SELECT `mem_id` FROM `user/pass` WHERE `username` = \"$username\"";
	  		$resultFName = mysqli_query($link, $qryFName);
	  		$resultLName = mysqli_query($link, $qryLName);
	  		$resultID = mysqli_query($link, $qryID);
	  		$fNameRow = mysqli_fetch_assoc($resultFName);
	  		$lNameRow = mysqli_fetch_assoc($resultLName);
	  		$idRow = mysqli_fetch_assoc($resultID);
	  		$fname = $fNameRow['fname'];
	  		$lname = $lNameRow['lname'];
	  		$id = $idRow['mem_id'];
	  		$_SESSION["SESS_FIRST_NAME"] = $fname;
			$_SESSION["SESS_LAST_NAME"] = $lname;
			$_SESSION["SESS_MEMBER_ID"] = $id;
	  		break;
	  	}
  	}
  	else{
  		continue;
  	}
  }
  
  
  header("Location: index.php");
  
?>