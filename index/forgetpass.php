<?php
require "../Admin/config.php";
include "nav.php";
 //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

function sendRecoveryLink($token, $email,$username){
    //Load Composer's autoloader
    require '../vendor/autoload.php';
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                               //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ahmedidrees22444@gmail.com';                     //SMTP username
        $mail->Password   = 'ousd lwkz hbhs wnzn';                               //SMTP password
        $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 
        //Recipients
        $mail->setFrom('ahmedidrees22444@gmail.com', 'Apexchoise');
        $mail->addAddress($email, $username);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'PASSWORD RECOVERY REQUEST';
        $mail->Body    = 'A request has been generated to reset your password. Please <b><a href="http://localhost/E-Project/index/resetpass.php?mailer='.$email.'&token='.$token.'">Click here</a></b> to reset your password.';
    
        $mail->send();
        echo '
        <script>alert("Email has been sent to you at '.$email.'. Please check your inbox")</script>
        ';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

if(isset($_POST['sendlink']) && $_SERVER['REQUEST_METHOD']=="POST"){
   $email= mysqli_real_escape_string($connect, $_POST['recoveryemail']);
   $token=md5(rand());

   $check="SELECT * FROM `customers_table` WHERE `E_Mail`='$email';";
   $result=mysqli_query($connect , $check) or die("failed to insert query.");

if($result){
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
$username=$row['Customer_Name'];

$updatetoken="UPDATE `customers_table` SET `token`='$token' WHERE E_Mail='$email'; ";
$updatetoken_run=mysqli_query($connect, $updatetoken) or die("faile to execute");
if($updatetoken_run){
    sendRecoveryLink($token, $email,$username);
}
}
else{
     echo "<script>alert('Please Signup First')
       window.location.href='signup.php';</script>;";
}
}}
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
                        <p class="text-center">Enter your email for password recovery</p>
                        <form id="signup-form" action="" method="post" novalidate="">
                            
                            <div class="form-group py-2">
                                        <input type="email" class="form-control underlined" name="recoveryemail" id="loginpassword" placeholder="Enter E-Mail" required> </div>
                                        <a href="login.php">Login Now?</a>
                                   
                                
                            
                             
                          
                            <div class="form-group ahmed py-3">
                                <button type="submit " value="login" name="sendlink" class="btn border border-primary px-4 py-3 rounded-pill text-secondary w-50">Send E-Mail</button>
                               <a href="signup.php" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-50">Create Account</a>
                            </div>
                            
                        
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>