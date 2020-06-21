<?php ob_start();
  $page_title = 'Edit Customer ';
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
  $e_user = find_by_cid('customers',(int)$_GET['cid']);
  
  if(!$e_user){
    $session->msg("d","Missing Customer id.");
    redirect('customer.php');
  }
?>

<?php

  if(isset($_POST['update2'])) {
    $req_fields = array('PhoneNumber','email');
    validate_fields($req_fields);
    if(empty($errors)){
             $cid = (int)$e_user['cid'];
           $FirstName = remove_junk($db->escape($_POST['FirstName']));
            $LastName = remove_junk($db->escape($_POST['LastName']));
             $PhoneNumber = remove_junk($db->escape($_POST['PhoneNumber']));
       $username = remove_junk($db->escape($_POST['username']));
       $email = remove_junk($db->escape($_POST['email']));
          
            $sql = "UPDATE customers SET FirstName ='{$FirstName}',LastName ='{$LastName}',PhoneNumber ='{$PhoneNumber}', username ='{$username}', email ='{$email}' WHERE cid='{$db->escape($cid)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Customer Updated ");
            redirect('edit_customer.php?cid='.(int)$e_user['cid'], false);
          } else {
            $session->msg('d',' Sorry failed to updated!');
            redirect('edit_customer.php?cid='.(int)$e_user['cid'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_customer.php?cid='.(int)$e_user['cid'],false);
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
          <form method="post" action="edit_customer.php?cid=<?php echo (int)$e_user['cid'];?>" class="clearfix">
            <div class="form-group">
                  <label for="FirstName" class="control-label">FirstName</label>
                  <input type="name" class="form-control" name="FirstName" value="<?php echo remove_junk(ucwords($e_user['FirstName'])); ?>">
            </div>
             <div class="form-group">
                  <label for="LastName" class="control-label">LaststName</label>
                  <input type="name" class="form-control" name="LastName" value="<?php echo remove_junk(ucwords($e_user['LastName'])); ?>">
                </div>
                 <div class="form-group">
                  <label for="Phonenumber" class="control-label">PhoneNumber</label>
                  <input type="name" class="form-control" name="PhoneNumber" value="<?php echo remove_junk(ucwords($e_user['PhoneNumber'])); ?>">
                </div>
            <div class="form-group">
                  <label for="username" class="control-label">Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
            </div>
            <div class="form-group">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_user['email'])); ?>">
            </div>
           
           
           
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update2" class="btn btn-info">Update</button>
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
