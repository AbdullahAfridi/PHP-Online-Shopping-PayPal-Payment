
<?php 
    require_once('includes/load.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


 



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_POST){
   $email= $_POST['Email']; 
     // echo $row['Password'];
   
   require 'C:\xampp\htdocs\PHPMailer-master/src/Exception.php';
   require 'C:\xampp\htdocs\PHPMailer-master/src/PHPMailer.php';
   require 'C:\xampp\htdocs\PHPMailer-master/src/SMTP.php';
   //require 'PHPMailer-master/PHPMailer.php';
   
   $mail = new PHPMailer(true);
   try{
       $mail->SMTPDebug = 0;
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = $_POST['Email'];
       $mail->Password = $_POST['Password'];
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
       
       $mail->setFrom('communicationramya@gmail.com');
       $mail->addAddress('communicationramya@gmail.com');
   
       $mail->isHTML(true);
       $mail->Subject = 'Inquiry';
       $mail->Body = '<h1 align=center> First Name: '.$_POST['FirstName'].'<br>LastName :'.$_POST['LastName'].'<br> Message : '.$_POST['Message'].'<br> Contact Number : '.$_POST['ContactNumber'];
       
       
       $mail->send();
       echo "<script>alert('Your message sent to Email ');</script>";
   } catch (Exception $e){
       echo "<script>alert('Message could not be sent. please Retry with correct Mail id & password');</script>";
   }
   
   }


?>
<!DOCTYPE html>

    <html>

    <head>
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="co.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>

    <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#" style="color:red; ">Ramya Communication</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="index.html">Home</a></li>
        <li><a href="#">Mobile Phones</a></li>
        <li><a href="aboutUs.html">About</a></li> 
        <li class="active"><a href="http://localhost/MyProj/contact.php">Contact</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost/Myproj/register1.php"></span> Sign Up</a></li>
        <li><a href="contact.php?logout='1'" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>

    </div>
  </div>

</nav>
    <form method="post" action="contact.php" class="contact-form">
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
        </div>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="name" class="form-control" name="FirstName" placeholder="Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="lname" class="form-control" name="LastName" placeholder="Last Name" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" class="form-control" name="Email" placeholder="Email" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Email's Password ">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="number" id="cont" class="form-control" name="ContactNumber" placeholder="Contact Number" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="email" class="form-control" name="address" placeholder="Adress" required="required">
                <p class="help-block text-danger"></p>
              </div>
            </div>
          </div>


          <div class="form-group">
      <textarea name="Message" id="Message" class="form-control" rows="4"          placeholder="Message" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h3>Contact Info</h3>
        <p><span><i class="fa fa-map-marker"></i> Address</span>205 Lover St,<br>
         Badulla, CA 12345</p>
      </div>
      <div class="contact-item">
        <p><span><i class="fa fa-phone"></i> Phone</span> +94769657777</p>
      </div>
      <div class="contact-item">
        <p><span><i class="fa fa-envelope-o"></i> Email</span> abdullahdaulatzai@yahoo.com</p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>