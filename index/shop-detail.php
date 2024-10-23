
<?php

require "../Admin/config.php";
include "nav.php";

session_start();
if(isset($_SESSION['user']) && $_SESSION['user']){
    





    ?>
<style>
        .card{
            height:500px;
            width: 500px;
        }
         .featureproducts{
            height: 90px ;
            width: 90px;
         }
         .banner{
            width:100%;
            height:350px;
        }
        .vesitable-item{
            width :100%;
           
        }
        .vesitable-img{
            height: 250px ;
            width :100%;

        }
        .padding{
            height: 310px ;
        }
        .ahmed{
                margin-top: 3%;
                text-transform: uppercase;
                letter-spacing: 0.2ch;
                font-family:  'Open Sans', 'Helvetica Neue';
                
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
                            <a href="index.php" class="nav-item nav-link  text-secondary ">Home</a>
                            <a href="shop.php" class="nav-item nav-link text-secondary ">Shop</a>
                            <a href="testimonial.php" class="nav-item nav-link text-secondary ">Feedbacks</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown">Card</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.php" class="dropdown-item">Cart</a>
                                    <a href="chackout.php" class="dropdown-item">Chackout</a>
                                     </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link text-secondary">Contact</a>
                        </div>
                        <div class="position-relative ">
                            <form action="shop.php" role="search" method="get">
                            <input class="form-control class border-2 border-secondary w-150 py-3 px-4 rounded-pill" type="Search" id="Search" name="Search" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary  position-absolute rounded-pill  text-white h-100" style="top: 0; right: 0%;"><i class="fas fa-search fa-2x"></i></button>
                        </form>
                        </div>
                        <div class="d-flex m-3 me-0">
                           
                            <a href="user.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->



        <!-- Single Page Header start -->
        
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
        <h1 class="ahmed  text-center text-dark display-3">Product Details</h1>
            <div class="container py-5">
            
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <?php
                        if(isset($_GET['product_id'])){
                            $product_id=$_GET['product_id'];
                            if(isset($_POST['Addtocart'])){
                                $product=$_POST['productid'];
                               $pquantity=$_POST['quantity'];
                               $customerid=$_POST['customerid'];
                               $price=$_POST['price'];
                               $total=$pquantity*$price;
                                $insert="INSERT INTO `cart_table`( `Customer_Id`, `Product_Id`, `Quantity`, `Price`, `Total`) VALUES ('$customerid','$product','$pquantity','$price','$total')";
                                $insertrun=mysqli_query($connect,$insert) or die("Fail");
                                if($insertrun){

                                    echo "<script>alert('Order Insert Successfully') 
                                    window.location.href='index.php'</script>  ";
                                }
                                else{
                                    echo "<script>alert('Order Not Insert')</script>";
                                }
                            }
                            
                          
                            
                       
                            $detail="SELECT * FROM `products table` as P INNER join category_table as C on P.Category_Id=C.Category_Id   WHERE `Status`=1 and P.Product_Id=$product_id;";
                            $product_detail=mysqli_query($connect,$detail) or die("Fail")      ;
                            if(mysqli_num_rows($product_detail)==1){
                                while($row=mysqli_fetch_assoc($product_detail)){
                                    ?>
                                    
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded ">
                                    <a href="#">
                                        <img src="../Admin/img/<?=$row['Image']?>" class="img-fluid rounded card" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 py-5">
                            <h4 class="mb-3 text-primary ">Product Name : </h4>
                                <h4 class=" mb-4 text-dark "><?=$row['Product_Name']?></h4>
                                <h5 class=" mb-4  text-dark"> <span class="  text-primary">Category : </span> <?=$row['Category_Name']?></h5>
                                <h5 class=" mb-4 text-dark"><span class=" mb-3 text-primary" >Price : </span><?=$row['Price']?></h5>
                                <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                               
<form action="" method="post">
    <input type="hidden" value="<?=$product_id?>" name="productid">
    <input type="hidden" value="<?= $_SESSION['Customer_Id']?>" name="customerid">
    <input type="hidden" value="<?=$row['Price']?>"name="price">
    <h5 class="mb-3 text-primary ">Quantity :</h5>
                                
                                <div class="input-group quantity mb-5 " style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quantity" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary" name="Addtocart"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
                            </div>
                            </form>
                            <h3 class=" text-primary ">Description :</h3>
                                <p class="md-4" style="width: 50%;"><?=$row['Description']?></p>
                        </div>
                                    <?php
                                }
                            }         
                        }else{
                            echo "<script>alert('Please Select Product') 
                                    window.location.href='shop.php'</script>  ";
                        }
                        ?>

                        
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            
                            <div class="col-lg-12">
                                <h4 class="mb-4">Featured products</h4>
                                
                                
                                <?php
                                        $feature="SELECT * FROM `products table` WHERE `Status`=1 limit 3;";
                                        $featureproducts=mysqli_query($connect,$feature) or die ("Fail");
                                        if(mysqli_num_rows($featureproducts)>0){
                                            while($row4=mysqli_fetch_assoc($featureproducts)){
                                                ?>
                                                <div class="d-flex align-items-center justify-content-start">
                                            <div class="rounded me-4 " style="width: 100px; height: 100px;">
                                                <img src="../Admin/img/<?= $row4['Image']?>" class="img-fluid rounded featureproducts" alt="">
                                            </div>
                                            <div>
                                                <h6 class="mb-2"><?=$row4['Product_Name'] ?></h6>
                                                <div class="d-flex mb-2">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="d-flex mb-2">
                                                    <h5 class="fw-bold me-2">Rs. <?=$row4['Price'] ?> PKR</h5>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                
                                
                                
                                <div class="d-flex justify-content-center my-4">
                                    <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Order Now</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="img/online-banner.jpg" class="img-fluid banner rounded" alt="">
                                            
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                <h1 class="fw-bold mb-0">Related Products</h1>
                <div class="vesitable">
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        <?php
                        $related="SELECT * FROM `products table` as P INNER JOIN category_table as C on P.Category_Id=C.Category_Id  WHERE `Status`=1  limit 6";
                        $relatedproducts=mysqli_query($connect,$related) or die("Fail");
                        if(mysqli_num_rows($relatedproducts) >0){
                            while($check=mysqli_fetch_assoc($relatedproducts)){
                                ?>
                                  <div class="border border-primary rounded position-relative   vesitable-item">
                        <div class="vesitable-img ">
                            <img src="../Admin/img/<?= $check['Image'] ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-secondary bg-dark px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;"><?=$check['Category_Name'] ?></div>
                        <div class="padding p-3 rounded-bottom">
                            <h4><?= $check['Product_Name'] ?></h4>
                            <p><?= $check['Description'] ?></p>
                            <div class=" d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">Rs. <?= $check['Price'] ?> PKR</p>
                                <a href="shop-detail.php?product_id=<?= $check['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                            </div>
                        </div>
                    </div>
                                <?php
                            }
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->
    

       
    </body>
    <?php
    include "../footer.php";
    ?>

</html>
<?php
}else{
    header("Location: login.php");
}
?>