<?php
require "../Admin/config.php";
include "nav.php";

  

if(isset($_POST['resetpass']) && $_SERVER['REQUEST_METHOD']=="POST"){
  $password= mysqli_real_escape_string($connect, $_POST['password']);
  $cpassword= mysqli_real_escape_string($connect, $_POST['cpassword']);
  
 if(isset($_GET['mailer'])){
    $mailer=$_GET['mailer'];
  }
if(isset($_GET['token'])){
    $token=$_GET['token'];
  }
  
   $check="SELECT * FROM `customers_table` WHERE token ='$token' AND E_Mail='$mailer' ;";
   $result=mysqli_query($connect , $check) or die("failed to insert query.");

if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
if(!$password=="" && !$cpassword=="" && $password==$cpassword){
    $newtoken=md5(rand());
    $hashpass=password_hash($password,PASSWORD_BCRYPT);

    
$updatePass="UPDATE `customers_table` SET `Password`='$hashpass',`token`='$newtoken' WHERE E_Mail ='$mailer';";
$updatePass_run=mysqli_query($connect , $updatePass) or die("failed to insert query.");
if($updatePass_run){
 echo"<script>alert('Your password has been updated. You can now login with your new password')
    window.location.href='login.php';
    </script>;";
}
else{
    echo"<script>alert('Something went wrong. Please try again later.')</script>;";
}
}
else{
    echo"<script>alert('Passwords should match and must not be empty.')</script>;";
}
}
else{
     echo "<script>alert('Invalid token.')</script>;";
}
}
?>

<style>
            .ahmed{
                justify-content: center;
      display: flex;
            }
        </style>
    </head>
    <body>
    <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title text-primary"> APEXCHOISE </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center">Enter New Password</p>
                        <form id="signup-form" action="" method="post" novalidate="">
                            
                            <div class="form-group py-2">
                            <input type="password" name="password" id="" class="form-control underlined " placeholder="Enter a strong password">
                        </div>
                        <div class="form-group py-2">
                        <input type="password" name="cpassword" id="" class="form-control underlined " placeholder="Confirm your password">
                        </div>
                                        
                                   
                                
                            
                             
                          
                            <div class="form-group ahmed py-3">
                                <button type="submit "  name="resetpass" class="btn border border-primary px-4 py-3 rounded-pill text-secondary w-100">ResetPass</button>
                            </div>
                            
                        
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
