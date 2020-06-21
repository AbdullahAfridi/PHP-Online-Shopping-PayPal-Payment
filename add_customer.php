	<?php ob_start();
  	$page_title = 'Add User';
 	 require_once('includes/load.php');
 	 page_require_level(1);
	?>
	<?php
  if(isset($_POST['add_customer'])){

   $req_fields = array('PhoneNumber' );
  	 validate_fields($req_fields);

   	if(empty($errors)){
       $FirstName   = remove_junk($db->escape($_POST['FirstName']));
        $LastName   = remove_junk($db->escape($_POST['LastName']));
        $PhoneNumber   = remove_junk($db->escape($_POST['PhoneNumber']));
       $username   = remove_junk($db->escape($_POST['username']));
      	 $email   = remove_junk($db->escape($_POST['email']));

     
      
       	$password = sha1($password);
       	 $query = "INSERT INTO customers (";
      	  $query .="FirstName,LastName,PhoneNumber,username,email";
      	  $query .=") VALUES (";
        $query .=" '{$FirstName}','{$LastName}','{$PhoneNumber}', '{$username}','{$email}'";
        $query .=")";
        if($db->query($query)){
        
          	$session->msg('s',"Customer Detials has been saved! ");
          redirect('add_customer.php', false);
        } else {
          
          $session->msg('d',' Sorry failed to save Customer Detilas!');
          	redirect('add_customer.php', false);
        }
   	} else {
    	 $session->msg("d", $errors);
      redirect('add_customer.php',false);
   	}
 	}
	?>
	<?php include_once('layouts/header.php'); ?>
  	<?php echo display_msg($msg); ?>
 	 <div class="row">
   	 <div class="panel panel-default">
     	 <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Customer</span>
      	 </strong>
      	</div>
      		<div class="panel-body">
      	  <div class="col-md-6">
          <form method="post" action="add_customer.php">
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control" name="FirstName" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" name="LastName" placeholder="Full Name">
          	  </div>
             <div class="form-group">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text" class="form-control" name="PhoneNumber" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
         	   <div class="form-group">
                <label for="username">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
          
            <div class="form-group clearfix">
              <button type="submit" name="add_customer" class="btn btn-primary">Add Customer</button>
            </div>
       	 </form>
       	 </div>

    	  </div>

	  	  </div>
 		 </div>

		<?php include_once('layouts/footer.php'); ?>
