<?php ob_start();
  require_once('includes/load.php');
  if(!$session->logout()) {redirect("login.php");}
?>
