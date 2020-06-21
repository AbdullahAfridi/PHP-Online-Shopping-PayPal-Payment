<?php ob_start();
  $page_title = 'Profit';
  require_once('includes/load.php');
?>
<?php

 page_require_level(1);

 $all_profit = find_all_Profit()
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
          <span>Customer</span>
       </strong>
         <a href="addprofit.php" class="btn btn-info pull-right">Add Profit</a>
      </div>
       <div class="panel-body">
        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Year </th>
            <th>Month </th>
            <th>Profit </th>
           
           
                <th class="text-center" style="width: 100px;">Actions</th>
              </tr>
            </thead>
            <tbody>
          <?php foreach($all_profit as $a_profit): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_profit['year']))?></td>
            <td><?php echo remove_junk(ucwords($a_profit['month']))?></td>
             <td><?php echo remove_junk(ucwords($a_profit['profit']))?></td>
          
        
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_profit.php?id=<?php echo (int)$a_profit['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_profit.php?id=<?php echo (int)$a_profit['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
