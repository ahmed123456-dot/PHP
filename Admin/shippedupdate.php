<?php
require "config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function  sendShipmentMail($Order_id,$E_Mail,$customer_name){
//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ahmedidrees22444@gmail.com';                     //SMTP username
    $mail->Password   = 'kqlw vouj ckzh apez';                               //SMTP password
    $mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ahmedidrees22444@gmail.com', 'Apexchoise');
    $mail->addAddress($E_Mail, $customer_name);     //Add a recipient
             
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Order Delivered';
    $mail->Body    = 'Hello '.$customer_name. ', Your Order Is <b>Successfully Delivered</b>. Please reach out to us for any query';


    $mail->send();
    // echo"done";
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}



session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $query=" SELECT * FROM `order_tale` as O  INNER join customers_table as C  on O.Customer_Id= C.Customer_Id WHERE Order_Id = $id;";
   $run=mysqli_query($connect,$query) or die("Fail");
   if(mysqli_num_rows($run)>0){
    $row=mysqli_fetch_assoc($run);
    $E_Mail=$row['E_Mail'];
    
    $customer_name=$row['Customer_Name'];
   
    $restore="UPDATE `order_tale` SET `Order_Status`='Shipped' WHERE `Order_Id`=$id";
    $restoretrash=mysqli_query($connect,$restore) or die("Fail");
    if($restoretrash){
        sendShipmentMail($id,$E_Mail,$customer_name);
        echo "<script>alert('Order Shipped') 
                                    window.location.href='orderdispatchtable.php'</script>  ";
    }
    else{
        echo "<script>alert('Not Shipped') 
        window.location.href='orderdispatchtable.php'</script>  ";
    }
    
}

}
}else{
    echo "<script>alert('Please Login First') 
    window.location.href='login.php'</script>  ";
}

    ?>