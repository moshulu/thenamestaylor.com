<?php
  session_start();
  include("contact.php");
  $email = $_POST['email'];
  $msg = $_POST['msg'];
  $name = $_POST['name'];
  $msg = wordwrap($msg, 70);
  mail("taylordodge3b@gmail.com","A message from $name ($email), from your website!", "$msg");
  header("Location: emailSuccess.php");
?>