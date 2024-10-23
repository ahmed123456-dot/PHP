<?php
require "config.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $restore="UPDATE `products table` SET `Status`=1 WHERE `Product_Id`=$id";
    $restoretrash=mysqli_query($connect,$restore) or die("Fail");
    if($restoretrash){
        echo "<script>alert('Restore Product') 
                                    window.location.href='trash.php'</script>  ";
    }
    else{
        echo "<script>alert('Not Restore') 
        window.location.href='trash.php'</script>  ";
    }
    
}


}else{
    echo "<script>alert('Please Login First') 
    window.location.href='login.php'</script>  ";
}
    ?>