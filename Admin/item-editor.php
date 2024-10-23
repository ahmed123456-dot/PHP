<?php
require "config.php";
include "../index/nav.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){


if(isset($_POST['Submit'])){
 $Products_Id=mysqli_real_escape_string($connect,$_POST['ProductsId']); 
$Products_Name=mysqli_real_escape_string($connect,$_POST['ProductsName']);
$description=mysqli_real_escape_string($connect,$_POST['Description']);
$Price=mysqli_real_escape_string($connect,$_POST['price']);
$stock_quantity=mysqli_real_escape_string($connect,$_POST['Stockquantity']);
$warranty_details=mysqli_real_escape_string($connect,$_POST['Warrantydetails']);
$category=mysqli_real_escape_string($connect,$_POST['category_id']);



if($_FILES['Image']['error']==4){
    echo "<script>alert('Please Upload Image')</script>";
}
else{
    $magname=$_FILES['Image']['name'];
    $size=$_FILES['Image']['size'];
    $tmpname=$_FILES['Image']['tmp_name'];

    $validextension=['jpg','png','jpeg'];
    $extension=explode(".",$magname);
    $extension=strtolower(end($extension));

    if($size > 500000){
        echo "<script>alert('Image Is So Large')</script>";
    }
    else{
        $image=uniqid();
        $image.=".".$extension;

        move_uploaded_file($tmpname,"img/".$image);

        $query="INSERT INTO `products table`(`Product_Id`,`Category_Id`, `Product_Name`, `Description`, `Price`, `Stock_Quantity`, `Warranty_Details`, `Image`) VALUES ('$Products_Id','$category','$Products_Name','$description','$Price','$stock_quantity','$warranty_details','$image')";
        $run=mysqli_query($connect,$query) or die("fail");
        if($run){
            echo "<script>alert('Product Added')</script>";
        }
        else{
            echo "<script>alert('Product Not Added')</script>";
        }

     

        
    }
}


}

?>

<style>
        .sidebar-overlay{
           
            justify-content: center;
            display: flex;
            margin-top:2%;
           
            
        }
        .content{
            
            width:80%;
            border-radius:50px;
            border-color: black;
            
        }
        .font{
            font-size: 75px;
        }
        .card{
            border: none;
        }
        label{
           
            font-size:120%;
            
        }
        .format{
            border: none !important;
    border-bottom: 1px solid #ffb524 !important;
   
    outline: none !important;
    width: 80%;

        }
        
       
        
        

        </style>
    </head>
    <body>
         <!-- Navbar start -->
       <div class="container-fluid bg-dark fixed-top">
            
            <div class="container ">
                <nav class="navbar navbar-light bg-dark navbar-expand-xl">
                <a href="index.php" class="navbar-brand">
                    
                    <h1 class="text-primary display-6 mt-2 " style="margin-left:-30px "><img src="img/logo.png" alt=""style="width:40px;margin-top:-8px " >Apexchoise</h1></a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-dark" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                            <a href="../index/index.php" class="nav-item nav-link  text-secondary ">Home</a>
                            <a href="../index/shop.php" class="nav-item nav-link text-secondary ">Shop</a>
                            <a href="../index/testimonial.php" class="nav-item nav-link text-secondary ">Feedbacks</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown">Card</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="../index/cart.php" class="dropdown-item">Cart</a>
                                    <a href="../index/chackout.php" class="dropdown-item">Chackout</a>
                                     </div>
                            </div>
                            <a href="../index/contact.php" class="nav-item nav-link text-secondary">Contact</a>
                        </div> 
                        <div class="position-relative ">
                            <form action="itemslist.php" role="search" method="get">
                            <input class="form-control class border-2 border-secondary w-150 py-3 px-4 rounded-pill" type="Search" id="Add" name="Add" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary  position-absolute rounded-pill  text-white h-100" style="top: 0; right: 0%;"><i class="fas fa-search fa-2x"></i></button>
                        </form>
                        </div>
                        <div class="d-flex m-3 me-0">
                           
                            <a href="../index/user.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        <div class="container-fluid page-header  py-5" style="background-image: url('../index/img/Admin.jpg');">
            <h1 class="text-center text-secondary display-6">Admin Panel</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <a href="index-2.php"  class="breadcrumb-item text-white ">Dashboard</a>
                <a href="itemslist.php" class="breadcrumb-item text-white">Product List</a>
                <a href="item-editor.php" class="breadcrumb-item ">Add Product</a>
                <a href="updatepage.php" class="breadcrumb-item  text-white">Update</a>
                <a href="delete.php" class="breadcrumb-item text-white">Delete</a>
                <a href="trash.php" class="breadcrumb-item text-white">Trash Product </a>
                <a href="ordertable.php" class="breadcrumb-item text-white">Order Table </a>
                <a href="Paymenttable.php" class="breadcrumb-item text-white">Payment Details</a>
                <a href="AdminProfile.php" class="breadcrumb-item text-white">Admin Profile </a>
            </ol>
        </div>
                
                
                    <div class="sidebar-overlay">
                        
                    
                    <form name="item" action="" method="post" enctype="multipart/form-data" class="content ">
                    <h1 class="text-left text-primary display-4 fw-semi-bold"> Add New Products    
                            <span class="sparkline bar" data-type="bar"></span>
                        </h5>
                    <div class="card card-block">
                        <div class="form-group row py-3">
                        <label class="col-lg-2 col-md-4 col-sm-6  text-xs-right"> Products Id : </label>
                                
                                <div class="col-sm-10">
                                    <input  class="format" type="number" name="ProductsId" class="form-control boxed" placeholder="Entre Your Product Id...!" > </div>
                                   
                            </div>
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Products Name : </label>
                                <div class="col-sm-10">
                                    <input class="format" type="text" name="ProductsName" class="form-control boxed" placeholder="Entre Your Product Name...!" > </div>
                            </div>
                            
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Description : </label>
                                <div class="col-sm-10">
                                <textarea class="format" name="Description" style="height: 100px;  resize: none;" type="text" class="form-control boxed" placeholder="Enter Your Product Description...!" ></textarea> 
                                 </div>
                            </div>
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6 text-xs-right"> Category : </label>
                                <div class="col-sm-10">
                                    <select  class="format col-lg-2 col-md-4 col-sm-6 text-dark  boxed" name="category_id" id="">
                                        <option value="" selected disabled class="col-lg-2 col-md-4 col-sm-6 text-dark">Select Category</option>
                                        <?php
                                        $category="SELECT * FROM `category_table`;";
                                        $category_use=mysqli_query($connect,$category) or die("Fail");
                                        if(mysqli_num_rows($category_use)>0){
                                            while($row=mysqli_fetch_assoc($category_use)){
                                                ?>
                                            <option value="<?=$row['Category_Id'] ?>" ><?=$row['Category_Name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Price : </label>
                                <div class="col-sm-10">
                                    <input  class="format" type="tell" name="price" class="form-control boxed" placeholder="Enter Product Price...!" > </div>
                            </div>
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6 text-xs-right"> Stock Quantity : </label>
                                <div class="col-sm-10">
                                    <input  class="format" type="number" name="Stockquantity" class="form-control boxed" placeholder="Enter Product Stock Quantity...!" > </div>
                            </div>
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Warranty Details : </label>
                                <div class="col-sm-10">
                                    <input  class="format" type="tell" name="Warrantydetails" class="form-control boxed" placeholder="Enter Product Price Warranty Details...!" > </div>
                            </div>
                            
                            
                            <div class="form-group row py-3">
                                <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Images : </label>
                                <div class=" col-sm-10">
                              
                                <input class="format form-control bg-primary"   type="file" name="Image" id="" accept=".jpg,.png,.jpeg"   > </div>
                            </div>
                                           
                                           
                                      
                            </div>
                            <div class="form-group row py-4">
                                <div class=" col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="  btn border border-secondary px-4 py-3 rounded-pill text-primary w-100 " name="Submit"> Add Product </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                     
                
    </body>
    <?php
    include "../footer.php";
    ?>

</html>
<?php
}else{
    header("location: login.php");
}
?>