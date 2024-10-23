<?php
require "../Admin/config.php";
include "../index/nav.php";

?><style>
        .fruite-img{
            height: 350px ;
           
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
        .set{
            width:
        }
        
        
    
        
    </style>

    <body >


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
                            <a href="index.php" class="nav-item nav-link  active ">Home</a>
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
        
        <!-- Hero Start -->
        <div class="container-fluid py-5  hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Guaranteed Products</h4>
                        <h1 class="mb-5 display-3 text-primary">New Generation & Guarantee Product</h1>
                        
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="img/Gifts.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Gift Items</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/Watchs.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Watchs</a>
                                </div>

                                <div class="carousel-item rounded">
                                    <img src="img/wallet.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Gents Wallet</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/Cosmetics.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Cosmetics</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/ladies-bags.jpg" class="image img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Ladies Bags</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/perfumes.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Perfumes</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
        <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-car-side fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Free Shipping</h5>
                                <p class="mb-0">Free on order over $300</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Security Payment</h5>
                                <p class="mb-0">100% security payment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>30 Day Return</h5>
                                <p class="mb-0">30 day money guarantee</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs Section End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-120">
                        <div class="col-lg-4 text-start">
                            <h1 class="text-left display-2">Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active"  href="index.php?getall">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                                <?php 
                                $brands="SELECT * FROM `category_table`;";
                                $check=mysqli_query($connect,$brands) or die ("Fail");
                                if(mysqli_num_rows($check)>0){
                                    while($row=mysqli_fetch_assoc($check)){
                                        ?>
                                        
                                        <li class="nav-item">
                                        <a class="d-flex py-2 m-2 bg-light rounded-pill active" href="index.php?brands_Id=<?=$row['Category_Id'] ?>" >
                                            <span class="text-dark" style="width: 130px;"><?= $row['Category_Name'] ?> </span>
                                        </a>
                                    </li> 
                                    <?php
                                    }
                                    
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div  class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <?php
                                          if(isset($_GET['brands_Id'])){
                                            $Category_Id=$_GET['brands_Id'];
                                            $upload="SELECT * FROM `products table` as P INNER join category_table as C on P.Category_Id=C.Category_Id  WHERE  `Status`=1 and P.Category_Id=$Category_Id ;";
                                            $run=mysqli_query($connect,$upload) or die("Fail");
                                            if(mysqli_num_rows($run)>0){
                                        
                                        
                                                    while($row1=mysqli_fetch_assoc($run)){
                                                        ?>
                                                          <div class="col-md-12 col-lg-8 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="../Admin/img/<?=$row1['Image']?>" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?=$row1['Product_Name']?></h4>
                                                    <p><?=$row1['Description']?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs. <?=$row1['Price']?> PKR</p>
                                                        <a href="shop-detail.php?product_id=<?= $row1['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                        <?php
                                                    }
                                                }
                                               
                                            }else{
                                                $all="SELECT * FROM `products table` WHERE `Status`=1 limit 6  ";
                                                $getall=mysqli_query($connect,$all) or die ("Fail");
                                                if(mysqli_num_rows($getall)){
                                                    while($row2=mysqli_fetch_assoc($getall)){
                                                        
                                                        ?>
                                                          <div class="col-md-12 col-lg-8 col-xl-4">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="../Admin/img/<?=$row2['Image']?>" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?=$row2['Product_Name']?></h4>
                                                    <p><?=$row2['Description']?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs. <?=$row2['Price']?> PKR</p>

                                                        <?php
                                                        
                                                        ?>
                                                        <a href="shop-detail.php?product_id=<?= $row2['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary" id="login" name="login"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }


                                        ?>


                                       
                                       
                                 
                                 
                                       
                                        
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                        
                        
                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-secondary">
                                <img src="img/cosmetics-21.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-dark text-center p-4 rounded">
                                        <h5 class="text-white">Cosmetics</h5>
                                        <h3 class="text-primary">20% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/watch-11.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Watches</h5>
                                        <h3 class="mb-0">15% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="img/perfumes-11.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-dark text-center p-4 rounded">
                                        <h5 class="text-white">Gents Perfumes</h5>
                                        <h3 class="text-primary">10% OFF</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">New Collection</h1>
                <div class="owl-carousel vegetable-carousel  ">
                    <?php
                    $cate="SELECT * FROM `products table` as P INNER JOIN category_table as C on P.Category_Id=C.Category_Id  WHERE `Status`=1 ORDER BY Product_Id Desc limit 10";
                    $start=mysqli_query($connect,$cate) or die("Fail");
                    if(mysqli_num_rows($start)>0){
                        while($real=mysqli_fetch_assoc($start)){
                            ?>
                            <div class="border border-primary rounded position-relative   vesitable-item">
                        <div class="vesitable-img ">
                            <img src="../Admin/img/<?= $real['Image'] ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-secondary bg-dark px-3 py-1  rounded position-absolute" style="top: 10px; right: 10px;"><?=$real['Category_Name'] ?></div>
                        <div class="padding p-3 rounded-bottom">
                            <h4><?= $real['Product_Name'] ?></h4>
                            <p><?= $real['Description'] ?></p>
                            <div class=" d-flex justify-content-between flex-lg-wrap">
                                <p class="text-dark fs-5 fw-bold mb-0">Rs. <?= $real['Price'] ?> PKR</p>
                                <a href="shop-detail.php?product_id=<?= $real['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
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
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-dark my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-1 text-white ">GIFTS ITEMS</h1>
                            <p class="fw-normal display-3 text-primary mb-4 " >UP TO 20% OFF</p>
                            <p class="mb-4 text-white">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                            <a href="#" class="banner-btn btn border-2 border-secondary rounded-pill text-primary py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/gift-items.png" class="img-fluid w-100 rounded" alt="">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Bestseller Products</h1>
                    <p>These are the most searched and most bought items because it is invented for new generations.</p>
                    </div>
                <div class="row g-4">
                    <?php
                   $best="SELECT * FROM `products table` where `Category_Id` between 2 and 3 order by Product_Id desc  limit 4";
                   $bestselller=mysqli_query($connect,$best) or die("Fail");
                   if(mysqli_num_rows($bestselller)>0){
                    while($seller=mysqli_fetch_assoc($bestselller)){
                        ?>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="text-center">
                            <img src="../Admin/img/<?=$seller['Image'] ?>" class="img-fluid rounded" style="height: 250px;" alt="">
                            <div class="py-4">
                                <a href="#" class="h5"><?=$seller['Product_Name'] ?></a>
                                <div class="d-flex my-3 justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">Rs. <?=$seller['Price'] ?> PKR</h4>
                                <a href="shop-detail.php?product_id=<?= $seller['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
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
        <!-- Bestsaler Product End -->




      

        
    </body>
    <?php
    include "../footer.php";
    ?>

</html>