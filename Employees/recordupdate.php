<?php
require "config.php";


session_start();
if(isset($_SESSION['isemployee'] ) && $_SESSION['isemployee']){
    $id=$_POST['ProductsId'];
    $name=$_POST['ProductsName'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $Stockquantity=$_POST['Stockquantity'];
    $warranty=$_POST['Warrantydetails'];
    

    $update="UPDATE `products table` SET `Product_Id`='$id',`Product_Name`='$name',`Description`='$description',`Price`='$price',`Stock_Quantity`='$Stockquantity',`Warranty_Details`='$warranty' WHERE `Product_Id`='$id';";
    $updaterun=mysqli_query($connect,$update) or die("Fail");
    if($updaterun){
        echo "<script>alert('Update Successfully') 
                                    window.location.href='updatepage.php'</script>  ";
    }
    else{
        echo "<script>alert('Not Update Record') 
        window.location.href='updatepage.php'</script>  ";
    }



}else{
    echo "<script>alert('Please Signup First') 
    window.location.href='login.php'</script>  ";
}

?>