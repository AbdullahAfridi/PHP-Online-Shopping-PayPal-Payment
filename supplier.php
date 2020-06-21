<?php ob_start();
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_supplier();
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
         <a href="add_supplier.php" class="btn btn-info pull-right">Add New Supplier</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>FirstName </th>
            <th>LastName</th>
            <th>email</th>
            <th>city</th>
            <th>streetNo</th>
           
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
            <td><?php echo remove_junk(ucwords($a_user['city']))?></td>
            <td><?php echo remove_junk(ucwords($a_user['streetNo']))?></td>

               <td class="text-center"> 
             <div class="btn-group">
                <a href="edit_supplier.php?supid=<?php echo (int)$a_user['supid'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_supplier.php?supid=<?php echo (int)$a_user['supid'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
