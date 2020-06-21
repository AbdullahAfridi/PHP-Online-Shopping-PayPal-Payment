<?php
session_start();


?>


<html>

    <head>


        <style>
            body{

                padding: 0;
                margin: 0;
                background-color: #00b16a;
                background-size: cover;
                font-family:sans-serif;
            }
            .loginbox{
                width:320px;
                height:390px;
                background:#000;
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

            .loginbox input[type="text"],input[type="password"]{
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
        <script language="javascript">
         window.alert(" Reset code  submitted Successfully  ");
        </script>
        <?php
        $ser = "localhost";
        $user = "root";
        $pass = "";
        $db = "ramyacommunication";
        $con = mysqli_connect($ser, $user, $pass) or die("connection failed");
        $selected = mysqli_select_db($con, $db) or die("Colud not selected database");
        ?>
        <div class="loginbox">
            <img src="images.jfif" class="avatar">
            <form action="ResetPassword1.php" method="post">
                <h1>Forget Password </h1>
                <p>New Password</p>
                <input type="password" name="PWD1" placeholder="Enter New Password" required>
                <p>Re-enter Password</p>
                <input type="password" name="PWD2" placeholder="Re-enter Password" required>
                <input type="submit"  value="Submit" name="Reset3">
            </form>
            <?php
            if (isset($_POST["Reset3"])) {
                $P1 = $_POST["PWD1"];
                $P2 = $_POST["PWD2"];
                $PWord= md5($P2);
                
                if ($P1 != "" && $P2 != "") {
                     if ($P1  == $P2 ){
                         $E=$_SESSION['Email'];
                         
                         $q1 = "select * from users where email='$E'";
                    $result1 = mysqli_query($con, $q1);
                    $count1 = mysqli_num_rows($result1);
                    
                    if ($count1 > 0) {
                         $Q1="UPDATE users SET password =  '$PWord' WHERE email='$E'";
                  
                         if(mysqli_query($con, $Q1)){
                             header("Location:login.php") ;
                         }
                        
                    }
                    
                     }else {
                    echo"<font color=red> Password Mismatched</font><br>";
                }
                }else {
                echo "<font color=red>Enter New Password</font><br>";
            }
            } 
            ?>
            
        </div> 


    </body>

</html>
