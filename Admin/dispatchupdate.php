<?php
require "config.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
   $query="SELECT * FROM `order_tale` where `Order_Id`=$id";
   $run=mysqli_query($connect,$query) or die("Fail");
   if(mysqli_num_rows($run)>0){
    $row=mysqli_fetch_assoc($run);
    $payment_type=$row['Payment_type'];
    if($payment_type !="VPP"){
        echo"hi";
        $checkPaymentStatus="SELECT * FROM `payments table` WHERE Order_Id=$id";
        $checkPaymentStatus_run=mysqli_query($connect,$checkPaymentStatus) or die("failed");
        if($checkPaymentStatus_run){

        
        if(mysqli_num_rows($checkPaymentStatus_run) > 0){
           
            $restore="UPDATE `order_tale` SET `Order_Status`='Dispatch' WHERE `Order_Id`=$id";
            $restoretrash=mysqli_query($connect,$restore) or die("Fail");
            if($restoretrash){
                echo "<script>alert('Order Dispatch') 
                window.location.href='ordertable.php'</script>  ";
            }
            else{
                echo "<script>alert('Not Dispatch') 
                window.location.href='ordertable.php'</script>  ";
            }
        }else{
            echo "<script>alert('Can`t Dispatch Order without Payment.') 
            window.location.href='ordertable.php'
            console.log('error')</script>  ";

           
        }}
    }else{
        $restore="UPDATE `order_tale` SET `Order_Status`='Dispatch' WHERE `Order_Id`=$id";
            $restoretrash=mysqli_query($connect,$restore) or die("Fail");
            if($restoretrash){
                echo "<script>alert('Order Dispatch') 
                window.location.href='ordertable.php'</script>  ";
            }
            else{
                echo "<script>alert('Not Dispatch') 
                window.location.href='ordertable.php'</script>  ";
            }

    }
   }
   
    
}


}else{
    echo "<script>alert('Please Login First') 
    window.location.href='login.php'</script>  ";
}
    ?>