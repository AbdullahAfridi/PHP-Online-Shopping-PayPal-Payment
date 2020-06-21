<?php ob_start();
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_sid('supplier',(int)$_GET['supid']);
  if($delete_id){
      $session->msg("s","Supplier deleted.");
      redirect('supplier.php');
  } else {
      $session->msg("d","Supplier deletion failed ");
      redirect('supplier.php');
  }
?>
