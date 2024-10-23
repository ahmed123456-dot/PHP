<?php
require "config.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $permenant="DELETE FROM `products table` WHERE `Product_Id` = '$id';";
    $permenantdelete=mysqli_query($connect,$permenant);
    if($permenantdelete){
        echo "<script>alert('Permanent Delete') 
                                    window.location.href='trash.php'</script>  ";
    }
    else{
        echo "<script>alert('No Permanent Delete') 
        window.location.href='trash.php'</script>  ";
    }
}


}else{
    echo "<script>alert('Please Signup First') 
    window.location.href='login.php'</script>  ";
}
    ?>