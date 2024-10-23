<?php
require "../Admin/config.php";
include "nav.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Retrieve and sanitize user input
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["loginpassword"]; // You may want to sanitize or hash the password as needed.

    // Validation
    $errors = array();

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate password (you can add more complex rules)
    if (strlen($password) < 3) {
        $errors[] = "Password must be at least 6 characters";
    }

    // If no errors, perform further actions (e.g., authenticate the user)
    if (empty($errors)) {
        $loginemail=mysqli_real_escape_string($connect,$_POST['loginemail']);
        $loginpassword=mysqli_real_escape_string($connect,$_POST['loginpassword']);
    
        $login="SELECT * FROM `customers_table` WHERE E_Mail='$loginemail'";
        $loginrun=mysqli_query($connect,$login) or die("Fail");
        if($loginrun){
            if(mysqli_num_rows($loginrun)==1){
                $row=mysqli_fetch_assoc($loginrun);
                $custamerid=$row['Customer_Id'];
                $email=$row['E_Mail'];
                $sepass=$row['Password'];
                $name=$row['Customer_Name'];
               
    
                $passverfy=password_verify($loginpassword,$sepass);

                

                if($passverfy){
                    session_start();
                $_SESSION['Customer_Id']=$custamerid;
                $_SESSION['Customer_Name']=$name;
                $_SESSION['E_Mail']=$email;
                $_SESSION['Password']=$sepass;
                
                $_SESSION['user']=true;
                    header("Location: index.php");
                }
                else{
                    echo "<script>alert('Wrong Password') 
                    window.location.href='login.php'</script>  ";
                }
                
            }
            else{
                echo "<script>alert('Please Signup First') 
                                    window.location.href='signup.php'</script>  ";
            }
        }
        else{
            echo '<script>alert("Fail to login")</script>';
        }
        exit();
    }
}
?>

<!-- Your HTML form goes here -->

<div class="error-messages">
    <?php
    // Display error messages
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<script>alert('$error')</script>";
        }
        echo "</ul>";
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
                        <p class="text-center">CUSTOMERS LOGIN</p>
                        <form id="signup-form" action="" method="post" novalidate="">
                            
                            <div class="form-group py-2">
                                <input type="email" class="form-control underlined" name="loginemail" id="loginemail" placeholder="Enter email address" required=""> </div>
                            <div class="form-group py-2">
                                        <input type="password" class="form-control underlined" name="loginpassword" id="loginpassword" placeholder="Enter password" required=""> </div>
                                        <a href="forgetpass.php">Forget your password?</a>
                                   
                                
                            
                             
                          
                            <div class="form-group ahmed py-3">
                                <button type="submit " value="login" name="login" class="btn border border-primary px-4 py-3 rounded-pill text-secondary w-50">Login</button>
                               <a href="signup.php" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-50">Create Account</a>
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
        