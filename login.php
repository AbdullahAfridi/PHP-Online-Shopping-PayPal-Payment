		
	 <?php
  
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
	?>
	
		<!DOCTYPE html>

		<html>

			<head>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Login </title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="login.css">

  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<style>
			#label{
				font-size: 15px;
				color:black;
			}

	</style>
		</head>
		<body>
			
		<form  method="Post" action="login.php">  
		
		<div class="login-wrap">
		<div class="login-html">
		<?php echo display_error(); if($session->isUserLoggedIn(true)) { redirect('home.php', false);} ?>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab" >Customer Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Admin Login</label>
		
		
			
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label style="font-size:15px;color:black" for="user" class="label">Username</label>
					<input id="user" type="text" name="username" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label" style="font-size:15px;color: black">Password</label>
					<input id="pass" type="password" name= "password" class="input" data-type="password">
				</div>
				
				<div class="group">
					<input type="submit" class="button" name="login_btn" value="Login">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="Forget.php">Forgot Password?</a><br>
					<a href="register1.php">Register Now</a>
				</div>
			</div>
			<div class="sign-up-htm">
				
				<div class="group"></form>
					<?php echo display_msg($msg); ?>
					<form method="post" action="auth.php">
					<label for="user" class="label" style="font-size:15px;color: black">Username</label>
					<input id="user" type="text"  name="username" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label" style="font-size:15px;color: black">Password</label>
					<input id="pass" type="password" name= "password" class="input" data-type="password">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Login">
				</div>
				<div class="hr"></div>

				<div class="foot-lnk">
					<a href="Forget1.php">Forgot Password?</a>
				</div>
				
					</div>
				</div>
				</div>
			</div>
			</form>
			
	</body>
	</html>
