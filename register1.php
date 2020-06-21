		<?php require_once('includes/load.php'); ?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" href="ceso.css">
		</head>
	<body>
	<div class="header">
	<h2>Register</h2>
	</div>
	<form method="post" action="register1.php">
	<?php echo display_error(); ?>
	
		<div class="input-group">
		<label>FirstName</label>
		<input type="text" name="FirstName" value="<?php echo $FirstName; ?>">
		</div>
		<div class="input-group">
		<label>LastName</label>
		<input type="text" name="LastName" value="<?php echo $LastName; ?>">
		</div>
		<div class="input-group">
		<label>PhoneNumber</label>
		<input type="number" name="PhoneNumber" value="<?php echo $PhoneNumber; ?>">
		</div>
		<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
		</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>