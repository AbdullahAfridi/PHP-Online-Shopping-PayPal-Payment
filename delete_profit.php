<?php ob_start();
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('profits',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Record deleted.");
      redirect('profit.php');
  } else {
      $session->msg("d","Record deletion failed.");
      redirect('profit.php');
  }
?>
