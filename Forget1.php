<?php
session_start();
?>

<html>

    <head>

        <style>
            body{

                padding: 0;
                margin: 0;
                background-color:white;
                background-size: cover;
                font-family:sans-serif;
            }
            .loginbox{
                width:320px;
                height:300px;
                background:black;
                color:#fff;
                border-radius:12px;
                left:50%;
                top:-35px;
                position:absolute;
                transform:translate(-50%,50%);  
                box-sizing:border-box;
                padding:70px 30px;
            }

            .avatar{
                width:100px;
                height:100px;
                position:absolute;
                top:-50px;
                right:35%;
            }

            h1{
                padding:0;
                height:0 0 20px;
                text-align:center;
                font-size:22px;

            }

            .loginbox p{
                padding:0;
                margin:0;
                font-weight:bold;
            }

            .loginbox input{
                width:100%;
                margin-bottom:20px;

            }

            .loginbox input[type="email"]{
                border:none;
                border-bottom:1px solid #fff;
                background:transparent;
                outline:none;
                height:40px;
                color:#fff;
                font-size:16px;

            }

            .loginbox input[type="submit"]{
                border:none;
                outline:none;
                height:40px;
                border-radius:25px;
                background:#ff9900;
                color:#fff;
                font-size:18px;

            }

            .loginbox input[type="submit"]:hover{
                cursor:pointer;
                background:#009900;
                color:#fff;
            }

            .loginbox a{
                text-decoration:none;
                font-size:12px;
                line-height:20px;
                color:darkgrey;

            }
            .loginbox a:hover{

                color:#ffc107;

            }
        </style>
    </head>

    <body>
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        $ser = "localhost";
        $user = "root";
        $pass = "";
        $db = "ramyacommunication";
        $con = mysqli_connect($ser, $user, $pass) or die("connection failed");
        $selected = mysqli_select_db($con, $db) or die("Colud not selected database");

        function generateRandomString($length = 6) {
            return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
        }
        ?>
        <div class="loginbox">
            <img src="download.jfif" class="avatar">
            <form action="Forget1.php" method="post">
                <h1>Forget Password </h1>
                <p>Email</p>
                <input type="email" name="Email" placeholder="Enter your email" >

                <input type="submit"  value="Submit" name="reset">
            </form>
            <?php
            if (isset($_POST["reset"])) {
                $E = $_POST["Email"];
                $_SESSION['Email'] = $E;
                if ($E != "") {
                    $q1 = "select * from users where email='$E'";
                    $result1 = mysqli_query($con, $q1);
                    $count1 = mysqli_num_rows($result1);
                    
                    if ($count1 > 0 ) {
                        $code = generateRandomString();
                         require 'C:\xampp\htdocs\MyProj\PHPMailer-master/src/Exception.php';
   require 'C:\xampp\htdocs\MyProj\PHPMailer-master/src/PHPMailer.php';
   require 'C:\xampp\htdocs\MyProj\PHPMailer-master/src/SMTP.php';
   //require 'PHPMailer-master/PHPMailer.php';
   
   $mail = new PHPMailer(true);
   try{
       $mail->SMTPDebug = 0;
       $mail->isSMTP();
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'communicationramya@gmail.com';
       $mail->Password = 'ramyaproject';
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
       
       $mail->setFrom('communicationramya@gmail.com','Ramya Communication');
       $mail->addAddress($E,$E);
   
       $mail->isHTML(true);
       $mail->Subject = 'Forgot Password ';
       $mail->Body ="Your Password Reset code is " . $code ;
       
       
         $q3 = "insert into forget (Email,ResetCode)values('$E','$code')";

                        $stmt = mysqli_prepare($con, $q3);
                        $count = mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_num_rows($stmt);
       $mail->send();
                   
                 header("location:ResetCode1.php");      
       echo 'Your Password has been sent on your Email ID.';
   } catch (Exception $e){
       echo 'Email could not be sent';
       echo 'Mailer Error: ' .$mail->ErrorInfo;
   }
                       

                       
                    } else {
                        echo"<font color=red>Invalid Email</font><br>";
                    }
                } else {
                    echo "<font color=red>Enter your email address</font><br>";
                }
            }
            ?>

        </div> 


    </body>

</html>