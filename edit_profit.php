<?php 
  $page_title = 'Edit Profits';
  require_once('includes/load.php');
 
   page_require_level(1);
?>
<?php
  $e_user = find_by_id('Profits',(int)$_GET['id']);
 
  if(!$e_user){
    $session->msg("d","Missing Profit id.");
    redirect('profit.php');
  }
?>

<?php

  if(isset($_POST['update1'])) {
    $req_fields = array('year');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $year = remove_junk($db->escape($_POST['year']));
       $month = remove_junk($db->escape($_POST['month']));
          $profit = (int)$db->escape($_POST['profit']);
     
            $sql = "UPDATE profits SET year ='{$year}', month ='{$month}',profit='{$profit}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Record Updated ");
            redirect('edit_profit.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_profit.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_profit.php?id='.(int)$e_user['id'],false);
    }
  }
?>

	<?php include_once('layouts/header.php'); ?>
	 <div class="row">
	   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
	  <div class="col-md-6">
	     <div class="panel panel-default">
	       <div class="panel-heading">
	        <strong>
	          <span class="glyphicon glyphicon-th"></span>
	        </strong>
	       </div>
	       <div class="panel-body">
	          <form method="post" action="edit_profit.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="year" class="control-label">Year</label>
                  <input type="name" class="form-control" name="year" value="<?php echo remove_junk(ucwords($e_user['year'])); ?>">
            </div>
            <div class="form-group">
                  <label for="month" class="control-label">Month</label>
                  <input type="text" class="form-control" name="month" value="<?php echo remove_junk(ucwords($e_user['month'])); ?>">
            </div>
          
            <div class="form-group">
                  <label for="profit" class="control-label">Profit</label>
                  <input type="text" class="form-control" name="profit" value="<?php echo remove_junk(ucwords($e_user['profit'])); ?>">
            </div>
            
            <div class="form-group clearfix">
                    <button type="submit" name="update1" class="btn btn-info">Update</button>
         	   </div>
       		 </form>
     		  </div>
  		   </div>
 			 </div>
  
				<?php include_once('layouts/footer.php'); ?>
