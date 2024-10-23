<?php
require "config.php";
include "../index/nav.php";

if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD']=="POST"){
    $loginemail=mysqli_real_escape_string($connect,$_POST['username']);
    $loginpass=mysqli_real_escape_string($connect,$_POST['password']);


    $query="SELECT * FROM `employees table` WHERE `E-Mail`='$loginemail' and `Employees_Role` = 'Admin';";
    $check=mysqli_query($connect,$query) or die ("Fail");

    if($check){
        if(mysqli_num_rows($check)==1){
            $row=mysqli_fetch_assoc($check);
            $name=$row['Employees_Name'];
            $email=$row['E-Mail'];
            $pass=$row['Password'];
            $employeerole=$row['Employees_Role'];
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['password']=$pass;
            $_SESSION['employeerole']=$employeerole;
            $_SESSION['email']=$email;
            $_SESSION['id']=$id;
            $_SESSION['isadmin']=true;

            header("location: index-2.php");
        }
        else{
            echo "<script>alert('You Not Admin') 
            window.location.href='login.php'</script>  ";
        }
    }
    else{
        echo "<script>alert('Fail to login')</script>";
    }
}
?>


        <style>
            .ahmed{
                justify-content: center;
      display: flex;
            }
        </style>
    </head>    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                <header class="auth-header">
                        <h1 class="auth-title text-primary"> APEXCHOISE </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-center fw-100">ADMIN LOGIN </p>
                        <form id="login-form" action="" method="post" >
                            <div class="form-group py-2">
                                <input type="email" class="form-control underlined" name="username" id="username" placeholder="Your email address" required> </div>
                            <div class="form-group py-2">
                                <input type="password" class="form-control underlined " name="password" id="password" placeholder="Your password" required> </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group py-3">
                            <button type="submit " value="login" name="login" class="btn border border-secondary px-4 py-2 rounded-pill active text-primary w-100">Login</button>
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
        <!-- Reference block for JS -->
        <!-- <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div> -->
        <!-- <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script> -->
    </body>

</html>