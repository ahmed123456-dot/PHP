<?php 
require "config.php";
include "../index/nav.php";
session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
?>

<style>
        
        .check-post{
    margin-top: 5%;
    justify-content: space-between;
    display: flex;
    margin-left:5%;
    margin-right:5%;
    
    
}
.stats-col{
    width:45%;
}
.card-block{
    padding:25px;
}
.image{
            width:50px;
            height:50px;
            border-radius:10px;
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
                <a href="index-2.php"  class="breadcrumb-item  ">Dashboard</a>
                <a href="itemslist.php" class="breadcrumb-item text-white">Product List</a>
                <a href="item-editor.php" class="breadcrumb-item text-white ">Add Product</a>
                <a href="updatepage.php" class="breadcrumb-item  text-white">Update</a>
                <a href="delete.php" class="breadcrumb-item text-white">Delete</a>
                <a href="trash.php" class="breadcrumb-item text-white">Trash Product </a>
                <a href="ordertable.php" class="breadcrumb-item text-white">Order Table </a>
                <a href="Paymenttable.php" class="breadcrumb-item text-white">Payment Details</a>
                <a href="AdminProfile.php" class="breadcrumb-item text-white">Admin Profile </a>
            </ol>
        </div>
        <!-- <div class="main-wrapper ">
           
                
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page"> -->
                    <section class="  ">
                        <div class=" check-post "> 
                            <div class=" col-xl-5 col-lg-10 col-md-15 col-sm-20 stats-col ">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title text-secondary"> Total Order</h4>
                                            <?php
                                            $check="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Shipped';";
                                            $recheck=mysqli_query($connect,$check);
                                            $againcheck=mysqli_num_rows($recheck);
                                            ?>
                                            <p class="title-description text-primary"> Total <?= $againcheck?> Orders For Website</a>
                                            </p>
                                        </div>
                                        <?php
                                        $product="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Shipped' ORDER by Order_Id DESC limit 5  ";
        $productcheck=mysqli_query($connect,$product) or die("Fail");
        if(mysqli_num_rows($productcheck)>0){
            ?>
             <div class="container">  
            <div class="row"> 
<table class="table table-hover">
<thead>
    <tr class="thhh text-dark py-3" >
    <th scope="col" class="">Order Id</th>
     
    
      <th scope="col">Payment Type</th>
      <th scope="col">Order Status</th>
    
      
    </tr>
  </thead>
  <?php
            while($row=mysqli_fetch_assoc($productcheck)){
                ?>
                <tr>
                
                    <td class="py-3"><?=$row['Order_Id'] ?></td>
                   
                    <td class="py-3"><?=$row['Payment_type'] ?></td>
                    <td class="py-3"><?=$row['Order_Status'] ?></td>
                    
                </tr>
                <?php

            }
        }
    
        ?>
         
</table>
</div>
</div>  
                                    </div>
                                </div>
                            </div>
                            <div class=" col-xl-5 col-lg-10 col-md-15 col-sm-20 stats-col ">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title text-secondary"> Total Pending Order</h4>
                                            <?php
                                            $check1="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Pending';";
                                            $recheck1=mysqli_query($connect,$check1);
                                            $againcheck1=mysqli_num_rows($recheck1);
                                            ?>
                                            <p class="title-description text-primary"> Total <?= $againcheck1?> Pending Orders For Website</a>
                                            </p>
                                        </div>
                                        <?php
                                        $pendingproduct="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Pending' ORDER by Order_Id DESC limit 5  ";
        $pendingproductcheck=mysqli_query($connect,$pendingproduct) or die("Fail");
        if(mysqli_num_rows($pendingproductcheck)>0){
            ?>
             <div class="container">  
            <div class="row"> 
<table class="table table-hover">
<thead>
    <tr class="thhh text-dark py-3" >
    <th scope="col" class="">Order Id</th>
     
    
      <th scope="col">Payment Type</th>
      <th scope="col">Order Status</th>
    
      
    </tr>
  </thead>
  <?php
            while($row1=mysqli_fetch_assoc($pendingproductcheck)){
                ?>
                <tr>
                
                    <td class="py-3"><?=$row1['Order_Id'] ?></td>
                   
                    <td class="py-3"><?=$row1['Payment_type'] ?></td>
                    <td class="py-3"><?=$row1['Order_Status'] ?></td>
                    
                </tr>
                <?php

            }
        }
    
        ?>
         
</table>
</div>
</div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="  ">
                        
                            <div class="container mt-5">
                                <div class="card sameheight-item stats " data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h1 class="title text-secondary"> Total Products </h1>
                                            <?php
                                            $check2="SELECT * FROM `products table`;";
                                            $recheck2=mysqli_query($connect,$check2);
                                            $againcheck2=mysqli_num_rows($recheck2);
                                            ?>
                                            <p class="title-description text-primary"> Total <?= $againcheck2?> Products For Website</a>
                                            </p>
                                        </div>
                                        <?php
                                        $productlist="SELECT * FROM `products table` as P INNER JOIN category_table as C on P.Category_Id=C.Category_Id  WHERE `Status` =1 ORDER BY Product_Id DESC limit 5  ";
        $productlistcheck=mysqli_query($connect,$productlist) or die("Fail");
        if(mysqli_num_rows($productlistcheck)>0){
            ?>
             <div class="container">  
            <div class="row"> 
<table class="table table-hover">
<thead>
    <tr class="thhh text-dark py-3" >
    <th scope="col" class="">Image</th>
     
    
      <th scope="col">Product Name</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
    
      
    </tr>
  </thead>
  <?php
            while($row2=mysqli_fetch_assoc($productlistcheck)){
                ?>
                <tr>
                
                <td><img class="image" src="img/<?=$row2['Image']?>" alt=""></td>
                   
                    <td class="py-3"><?=$row2['Product_Name'] ?></td>
                    <td class="py-3"><?=$row2['Category_Name'] ?></td>
                    <td class="py-3"><?=$row2['Price'] ?></td>
                </tr>
                <?php

            }
        }
    
        ?>
         
</table>
</div>
</div>  
</div>
                                </div>
                                </div>
                    </section>
                  
                            
                            
       
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