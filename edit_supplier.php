		<?php ob_start();
		  $page_title = 'Edit Customer ';
		  require_once('includes/load.php');
		 
		   page_require_level(1);
		?>
		<?php
		  $e_user = find_by_sid('supplier',(int)$_GET['supid']);
		  
		  if(!$e_user){
		    $session->msg("d","Missing Supplier id.");
		    redirect('supplier.php');
		  }
		?>

		<?php
		
		  if(isset($_POST['update3'])) {
		    $req_fields = array('email');
		    validate_fields($req_fields);
    if(empty($errors)){
             $supid = (int)$e_user['supid'];
           $FirstName = remove_junk($db->escape($_POST['FirstName']));
            $LastName = remove_junk($db->escape($_POST['LastName']));
             $email = remove_junk($db->escape($_POST['email']));
       $city = remove_junk($db->escape($_POST['city']));
       $streetNo = remove_junk($db->escape($_POST['streetNo']));
          
            $sql = "UPDATE supplier SET FirstName ='{$FirstName}',LastName ='{$LastName}',email ='{$email}', city ='{$city}', streetNo ='{$streetNo}' WHERE supid='{$db->escape($supid)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Supplier Updated ");
            redirect('edit_supplier.php?supid='.(int)$e_user['supid'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_supplier.php?supid='.(int)$e_user['supid'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_supplier.php?supid='.(int)$e_user['supid'],false);
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
          Update <?php echo remove_junk(ucwords($e_user['FirstName'])); ?> Account
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_supplier.php?supid=<?php echo (int)$e_user['supid'];?>" class="clearfix">
            <div class="form-group">
                  <label for="FirstName" class="control-label">First Name</label>
                  <input type="name" class="form-control" name="FirstName" value="<?php echo remove_junk(ucwords($e_user['FirstName'])); ?>">
            </div>
             <div class="form-group">
                  <label for="LastName" class="control-label">Last Name</label>
                  <input type="name" class="form-control" name="LastName" value="<?php echo remove_junk(ucwords($e_user['LastName'])); ?>">
                </div>
                 <div class="form-group">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_user['email'])); ?>">
                </div>
            <div class="form-group">
                  <label for="city" class="control-label">city</label>
                  <input type="text" class="form-control" name="city" value="<?php echo remove_junk(ucwords($e_user['city'])); ?>">
            </div>
            <div class="form-group">
                  <label for="streetNo" class="control-label">streetNo</label>
                  <input type="text" class="form-control" name="streetNo" value="<?php echo remove_junk(ucwords($e_user['streetNo'])); ?>">
            </div>
           
           
           
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update3" class="btn btn-info">Update</button>
            </div>
      		  </form>
    	   </div>
   					 </div>
  					</div>
 
      		  </form>
    		  </div>
   			 </div>
 			 </div>

 				</div>
		<?php include_once('layouts/footer.php'); ?>
