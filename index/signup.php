<?php
require "../Admin/config.php";
include "nav.php";
if(isset($_POST['signup'])){
    $name=mysqli_real_escape_string($connect,$_POST['name']);
    $email=mysqli_real_escape_string($connect,$_POST['email']);
    $password=mysqli_real_escape_string($connect,$_POST['password']);
    

    $securepass=password_hash($password, PASSWORD_BCRYPT);

    $check="SELECT * FROM `customers_table` WHERE E_Mail='$email'";
    $checkrun=mysqli_query($connect,$check) or die("Fail");
    if(mysqli_num_rows($checkrun)>0){
        echo ' <script>alert("Customer Already Register")</script>';
        
    }
    else{
        $signup="INSERT INTO `customers_table`(`Customer_Name`, `E_Mail`, `Password`) VALUES ('$name','$email','$securepass')";
        $signuprun=mysqli_query($connect,$signup) or die("Fail");
        if($signuprun){
            header("Location: login.php");
        }
        else{
            echo ' <script>alert("Registration Successful. Please login Now..!")</script>';
        }
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
                        <p class="text-center">SIGNUP TO GET INSTANT ACCESS</p>
                        <form id="signup-form" action="" method="post" novalidate="">
                            <div class="form-group py-2">
                                <input type="text" class="form-control underlined" name="name" id="name" placeholder="Enter firstname" required=""> 
                                </div>
                            <div class="form-group py-2">
                               <input type="email" class="form-control underlined" name="email" id="email" placeholder="Enter email address" required=""> </div>
                            <div class="form-group py-2">
                             <input type="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required=""> </div>
                            
                               <div class="form-group py-3 ahmed">
                                <button type="submit " value="Signup" name="signup" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-50">Sign Up</button>
                                <a href="login.php" class="btn border border-primary px-4 py-3 rounded-pill active text-secondary w-50">Already Login</a>
                            </div>
                            <div class="form-group ">
                            <a href="../index/index.php" class="btn btn-dark border border- px-4 py-2 rounded-pill active text-primary w-100">
                        <i class="fa fa-arrow-left"></i> Back to Home </a>
                        </div>
                           
                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        
    </body>

</html>