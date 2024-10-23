<?php
require "config.php";
include "../index/nav.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){

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
        .ahmed{
                margin-top: 3%;
                text-transform: uppercase;
                letter-spacing: 0.2ch;
                font-family:  'Open Sans', 'Helvetica Neue';
                
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
                            <form action="updatepage.php" role="search" method="get">
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
                <a href="item-editor.php" class="breadcrumb-item text-white">Add Product</a>
                <a href="updatepage.php" class="breadcrumb-item text-white ">Update</a>
                <a href="delete.php" class="breadcrumb-item text-white">Delete</a>
                <a href="trash.php" class="breadcrumb-item text-white">Trash Product </a>
                <a href="ordertable.php" class="breadcrumb-item text-white">Order Table </a>
                <a href="Paymenttable.php" class="breadcrumb-item text-white">Payment Details</a>
                <a href="AdminProfile.php" class="breadcrumb-item text-white">Admin Profile </a>
            </ol>
        </div>
        
        <?php
        if(isset($_GET['Id'])){
            $Id=$_GET['Id'];


            $query="SELECT * FROM `products table` WHERE `Status`=1 and `Product_Id`='$Id'";
            $result=mysqli_query($connect,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $name=$row['Product_Name'];
                    $description=$row['Description'];
                    $price=$row['Price'];
                    $stockquantity=$row['Stock_Quantity'];
                    $warranty=$row['Warranty_Details'];
                   
                    

                    ?>
                     <div class="sidebar-overlay ">
                        
                    
                        <form  action="recordupdate.php" method="post" enctype="multipart/form-data" class="content  ">
                        <h1 class="mb-4 ahmed  text-dark display-4">Update Product Data</h1>
                        <div class="card card-block">
                            <div class="form-group row py-3">
                            <label class="col-lg-2 col-md-4 col-sm-6  text-xs-right"> Products Id : </label>
                                    
                                    <div class="col-sm-10">
                                        <input  class="format text-dark" type="number" name="ProductsId"  placeholder="Entre Your Product Id...!" value="<?php echo $Id ?>" > </div>
                                       
                                </div>
                                <div class="form-group row py-3">
                                    <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Products Name : </label>
                                    <div class="col-sm-10">
                                        <input class="format  text-dark" type="text" name="ProductsName"  placeholder="Entre Your Product Name...!" value="<?php echo $name ?>" > </div>
                                </div>
                                
                                <div class="form-group row py-3">
                                    <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Description : </label>
                                    <div class="col-sm-10">
                                        <textarea class="format  text-dark"  name="description" style="height: 100px;  resize: none;" type="text" placeholder="Enter Your Product Description...!"> <?php echo $description ?></textarea>     
                                </div>
                                </div>
                                <div class="form-group row py-3">
                                    <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Price : </label>
                                    <div class="col-sm-10">
                                        <input  class="format  text-dark" type="tell" name="price"  placeholder="Enter Product Price...!" value="<?php echo $price ?>" > </div>
                                </div>
                                <div class="form-group row py-3">
                                    <label class=" col-lg-2 col-md-4 col-sm-6 text-xs-right"> Stock Quantity : </label>
                                    <div class="col-sm-10">
                                        <input  class="format  text-dark" type="number" name="Stockquantity"  placeholder="Enter Product Stock Quantity...!" value="<?php echo $stockquantity ?>" > </div>
                                </div>
                                <div class="form-group row py-3">
                                    <label class=" col-lg-2 col-md-4 col-sm-6  text-xs-right"> Warranty Details : </label>
                                    <div class="col-sm-10">
                                        <input  class="format  text-dark" type="tell" name="Warrantydetails"  placeholder="Enter Product Price Warranty Details...!" value="<?php echo $warranty ?>" > </div>
                                </div>
                                
                                
                                      
                                               
                                          
                                </div>
                                <div class="form-group row py-4">
                                    <div class=" col-sm-10 col-sm-offset-2">
                                        <button type="submit" class="  btn border border-secondary px-4 py-3 rounded-pill text-primary w-100 " name="Submit"> Update Product</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
       
                    <?php
                    
                }
            }
        }

        ?>
        

             
                
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