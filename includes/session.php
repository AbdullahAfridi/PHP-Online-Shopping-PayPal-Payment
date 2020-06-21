      <?php
          session_start();

    class Session {

  public $msg;
    private $user_is_logged_in = false;

      function __construct(){
     $this->flash_msg();
     $this->userLoginSetup();
  }

   public function isUserLoggedIn(){
    return $this->user_is_logged_in;
  }
     public function login($user_id){
    $_SESSION['user_id'] = $user_id;
  }
   private function userLoginSetup()
  {
       if(isset($_SESSION['user_id']))
     {
      $this->user_is_logged_in = true;
      } else {
      $this->user_is_logged_in = false;
     }

    }
    public function logout(){
     unset($_SESSION['user_id']);
    }

   public function msg($type ='', $msg =''){
     if(!empty($msg)){
          if(strlen(trim($type)) == 1){
         $type = str_replace( array('d', 'i', 'w','s'), array('danger', 'info', 'warning','success'), $type );
        }
        $_SESSION['msg'][$type] = $msg;
        } else {
        return $this->msg;
     }
  }

      private function flash_msg(){

    if(isset($_SESSION['msg'])) {
      $this->msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    } else {
        $this->msg;
      }
   }
    }

    $session = new Session();
    $msg = $session->msg();

    	


// connect to database
$db = mysqli_connect('localhost', 'root', '', 'ramyacommunication');

// variable declaration
$LastName  ="";
$FirstName ="";
$PhoneNumber ="";
$username = "";
$email    = "";
$errors   = array(); 
if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}



if (isset($_POST['register_btn'])) {
	register();
}

function register(){
	
	global $db, $errors, $username, $email,$FirstName,$LastName,$PhoneNumber;

	
    $FirstName		 =  e($_POST['FirstName']);
    $LastName		 =  e($_POST['LastName']);
    $PhoneNumber  =  e($_POST['PhoneNumber']);
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	
  $user_check_query = "SELECT * FROM customers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

	
	if (empty($FirstName)) { 
		array_push($errors, "FirstName is required"); 
	}
	if (empty($LastName)) { 
		array_push($errors, "LastName is required"); 
	}
	if (empty($PhoneNumber)) { 
		array_push($errors, "PhoneNumber is required"); 
	}
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	
	if (count($errors) == 0) {
		$password = md5($password_1);

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO customers (firstName,LastName,PhoneNumber,username, email, password,user_type) 
					  VALUES('$FirstName','$LastName','$PhoneNumber',$username', '$email', '$password','customers')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO customers (FirstName,LastName,PhoneNumber,username, email, password) 
					  VALUES('$FirstName','$LastName','$PhoneNumber','$username', '$email', '$password')";
			mysqli_query($db, $query);

			
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['customers'] = getUserById($logged_in_user_id);  
			$_SESSION['success']  = "You are now logged in";
			header('location: login.php');				
		}
	}
}


function getUserById($id){
	global $db;
	$query = "SELECT * FROM customers WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}


function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}


function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	


function isLoggedIn()
{
	if (isset($_SESSION['customers'])) {
		return true;
	}else{
		return false;
	}
}


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['customers']);
	header("location: login.php");
}


if (isset($_POST['login_btn'])) {
	login();
}


function login(){
	global $db, $username, $errors;

	
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM customers WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['customers'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: create_user.php');		  
			}else{
				$_SESSION['customers'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: contact.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}


    ?>
