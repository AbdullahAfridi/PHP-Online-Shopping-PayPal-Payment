<?php
  $page_title = 'Add Profit';
  require_once('includes/load.php');
  
  page_require_level(1);
?>
<?php
  if(isset($_POST['add_profit'])){

   $req_fields = array('profit' );
   validate_fields($req_fields);

   if(empty($errors)){
       $year  = remove_junk($db->escape($_POST['year']));
        $month   = remove_junk($db->escape($_POST['month']));
        $profit   = remove_junk($db->escape($_POST['profit']));
      
        $query = "INSERT INTO profits (";
        $query .="year,month,profit";
        $query .=") VALUES (";
        $query .=" '{$year}','{$month}','{$profit}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Profit Detials has been saved! ");
          redirect('addprofit.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to save Profit Detilas!');
          redirect('addprofit.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('addprofit.php',false);
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
          <span>Add Profit</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="addprofit.php">
            <div class="form-group">
                <label for="name">Year</label>
                <input type="text" class="form-control" name="year" placeholder="Year">
            </div>
            <div class="form-group">
                <label for="name">Month</label>
                <input type="text" class="form-control" name="month" placeholder="Month">
            </div>
             <div class="form-group">
                <label for="name">Profit</label>
                <input type="text" class="form-control" name="profit" placeholder="Profit">
            </div>
           
          
            <div class="form-group clearfix">
              <button type="submit" name="add_profit" class="btn btn-primary">Add Profit</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
