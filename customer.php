<?php ob_start();
 		 $page_title = 'All Customer';
 	 require_once('includes/load.php');
    ?>
    <?php

 		 page_require_level(1);
 		 
      $all_users = find_all_customer();
    ?>
        <?php include_once('layouts/header.php'); ?>
        <div class="row">
   		 <div class="col-md-12">
      <?php echo display_msg($msg); ?>
    </div>
    </div>
   		 <div class="row">
         <div class="col-md-12">
    		<div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Supplier</span>
       </strong>
         <a href="add_customer.php" class="btn btn-info pull-right">Add New Customer</a>
    	  </div>
    	 <div class="panel-body">
     		 <table class="table table-bordered table-striped">
        <thead>
       		   <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>First Name </th>
         		  <th>Last Name</th>
            <th>email</th>
        		    <th>Phone Number</th>
            
           
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
      		  </thead>
      		  <tbody>
       		 <?php foreach($all_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['FirstName']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['LastName']))?></td>
            <td><?php echo remove_junk(ucwords($a_user['email']))?></td>
        		    <td><?php echo remove_junk(ucwords($a_user['PhoneNumber']))?></td>
           
               <td class="text-center"> 
             <div class="btn-group">
                <a href="edit_customer.php?cid=<?php echo (int)$a_user['cid'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_customer.php?cid=<?php echo (int)$a_user['cid'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
       	 <?php endforeach;?>
     	  </tbody>
   		  </table>
   		  </div>
   		 </div>
 		 </div>
			</div>
  <?php include_once('layouts/footer.php'); ?>
