<?php
require "config.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $move="UPDATE `products table` SET `Status`=0 WHERE `Product_Id`=$id";
    $movetrash=mysqli_query($connect,$move) or die("Fail");
    if($movetrash){
        echo "<script>alert('Move to Trash') 
                                    window.location.href='delete.php'</script>  ";
    }
    else{
        echo "<script>alert('Not Record Delete') 
        window.location.href='delete.php'</script>  ";
    }
}



}else{
    echo "<script>alert('Please Signup First') 
    window.location.href='login.php'</script>  ";
}
    ?>