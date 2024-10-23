<?php

require "../Admin/config.php";

session_start();
if(isset($_SESSION['user'])){
    
   
    if(isset($_GET['item_id'])){
        $itemId=$_GET['item_id'];
    $removeItem="DELETE FROM `cart_table` where `Product_Id`=$itemId;";
    $removeItem_run=mysqli_query($connect, $removeItem) or die("failed");
    if($removeItem_run){
        echo "<script>alert('Item deleted Successfully')
        window.location.href='cart.php'</script>";
    }else{
        echo "<script>alert('Failed to remove this item right now..!')
        window.location.href='cart.php'</script>";
    
    }
    
    }else{
        header("location: cart.php");
    }



}else{
    header("Location: login.php");
}
    ?>
    