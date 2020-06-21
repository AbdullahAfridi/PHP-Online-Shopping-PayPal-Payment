<?php ob_start();
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_cid('customers',(int)$_GET['cid']);
  if($delete_id){
      $session->msg("s","Customer deleted.");
      redirect('customer.php');
  } else {
      $session->msg("d","User deletion failed Or Missing Prm.");
      redirect('customer.php');
  }
?>
