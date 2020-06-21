<?php ob_start();
  $page_title = 'Add Supplier';
  require_once('includes/load.php');
  
  page_require_level(1);

?>
<?php
  if(isset($_POST['add_supplier'])){

   $req_fields = array('FirstName' );
   validate_fields($req_fields);

   if(empty($errors)){
     $FirstName   = remove_junk($db->escape($_POST['FirstName']));
     $LastName   = remove_junk($db->escape($_POST['LastName']));
      $email   = remove_junk($db->escape($_POST['email']));
       $city   = remove_junk($db->escape($_POST['city']));
      $streetNo   = remove_junk($db->escape($_POST['streetNo']));
      
      
   
        $query = "INSERT INTO supplier (";
        $query .="FirstName,LastName,email,city,streetNo";
        $query .=") VALUES (";
        $query .=" '{$FirstName}','{$LastName}','{$email}', '{$city}','{$streetNo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Supplier Detial has been saved ");
          redirect('add_supplier.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_supplier.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_supplier.php',false);
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
          <span>Add New Supplier</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_supplier.php">
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" class="form-control" name="FirstName" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" class="form-control" name="LastName" placeholder="Last Name">
            </div>
             
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name ="city"  placeholder="City">
            </div>
            <div class="form-group">
                <label for="streetNo">Street Number</label>
                <input type="text" class="form-control" name ="streetNo"  placeholder="Street Number">
            </div>
            
            <div class="form-group clearfix">
              <button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
