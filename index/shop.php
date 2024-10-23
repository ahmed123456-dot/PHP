<?php
require "../Admin/config.php";
include "nav.php";
?>

        <style>
            
            .ahmed{
                margin-top: 3%;
                text-transform: uppercase;
                letter-spacing: 0.2ch;
                font-family:  'Open Sans', 'Helvetica Neue';
                
            }
            
        
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
        .featureproducts{
            height: 90px ;
            width: 90px;
         }
        .banner{
            width:100%;
            height:350px;
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
                            <a href="index.php" class="nav-item nav-link text-secondary ">Home</a>
                            <a href="shop.php" class="nav-item nav-link active">Shop</a>
                            <a href="testimonial.php" class="nav-item nav-link text-secondary">Feedbacks</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown">Card</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.php" class="dropdown-item">Card</a>
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
        <!-- <div class="container-fluid bg-dark py-5">
            <h1 class="text-center text-white display-6">Shop</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop</li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5 ">
            <div class="container py-5">
                <h1 class="mb-4 ahmed text-center text-dark display-4">Online Shopping Center</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            
                            
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="shop.php?get-all"><i class="fas fa-light fa-circle text-secondary me-2 s-small"></i>All Products</a>
                                                        
                                                    </div>
                                                </li>
                                                
                                                
                                                <?php
                                                $brands="SELECT * FROM `category_table`;";
                                                $check=mysqli_query($connect,$brands) or die ("Fail");
                                                if(mysqli_num_rows($check)>0){
                                                    while($row=mysqli_fetch_assoc($check)){
                                                        ?>
                                                        <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="shop.php?brands_Id=<?=$row['Category_Id'] ?>"><i class="fas fa-light fa-circle text-secondary me-2 s-small"></i><?=$row['Category_Name']?></a>
                                                        
                                                    </div>
                                                </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Additional</h4>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
                                                <label for="Categories-1"> Cosmetics</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
                                                <label for="Categories-2"> Fresh</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
                                                <label for="Categories-3"> Sales</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
                                                <label for="Categories-4"> Discount</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
                                                <label for="Categories-5"> Expired</label>
                                            </div>
                                        </div>
                                    </div>
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
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    <?php
                                    if(isset($_GET['Search'])){
                                        $limit=6;
                                        if(isset($_GET['page'])){
                                            $page=$_GET['page'];
                                        }
                                        else{
                                            $page=1;
                                        }
                                        $offset=($page - 1)*$limit;
                                        
                                        $search=$_GET['Search'];
                                        $searchquery="SELECT * FROM `products table` as P INNER JOIN category_table as C on P.Category_Id=C.Category_Id WHERE  P.Product_Name LIKE '%$search%' or P.Price LIKE '%$search%' or  C.Category_Name LIKE '%$search%' and `Status`=1 limit $offset,$limit;";
                                        $searchrun=mysqli_query($connect,$searchquery) or die("Fail");
                                        if(mysqli_num_rows($searchrun)>0){
                                            while($runsearch=mysqli_fetch_assoc($searchrun)){
                                                if($runsearch['Status']==1){

                                                
                                                ?>
                                                <div class="col-md-15 col-lg-10 col-xl-6">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="../Admin/img/<?=$runsearch['Image']?>" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?=$runsearch['Product_Name']?></h4>
                                                    <p><?=$runsearch['Description']?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs. <?=$runsearch['Price']?> PKR</p>
                                                        <a href="shop-detail.php?product_id=<?= $runsearch['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <?php
                                                }
                                            }
                                            ?>
                                            <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                    <?php
                                    $pageination="SELECT * FROM `products table` as P INNER JOIN category_table as C on P.Category_Id=C.Category_Id WHERE  P.Product_Name LIKE '%$search%' or P.Price LIKE '%$search%' or  C.Category_Name LIKE '%$search%' and `Status`=1 ";
                                    $pageination1=mysqli_query($connect,$pageination) or die("Fail");
                                   $totalrec=mysqli_num_rows($pageination1);
                                   $totalpage=ceil($totalrec/$limit);
                                   if($page >1){
                                    echo '<a href="shop.php?Search='.$search.'&page='.($page -1).'" class="rounded">&laquo;</a>';
                                   }

                                   for ($i=1; $i <= $totalpage; $i++) { 
                                    if($page ==$i){
                                        $active="active";
                                    }
                                    else{
                                        $active="";
                                    }
                                    echo '<a href="shop.php?Search='.$search.'&page='.$i.'" class="'.$active.' rounded">'.$i.'</a>';
                                   }
                                   if($page < $totalpage){
                                    echo ' <a href="shop.php?Search='.$search.'&page='.($page +1).'" class="rounded">&raquo;</a>';
                                   }
                                   ?>
                                   
                                    
                                            
                                           
                                   </div>
                               </div> 
                               <?php
                                        }
                                        else{
                                            echo '<h1 class="text-center text-primary" >No Products Founds Try Again</h1>
                                            <a href="shop.php" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-50">Click Now</a>';
                                        }

                                    
                                   
                                }else{

                                    
                                    if(isset($_GET['brands_Id'])){
                                          $limit=4;
                                        if(isset($_GET['page'])){
                                            $page=$_GET['page'];
                                        }
                                        else{
                                            $page=1;
                                        }
                                        $offset=($page - 1)*$limit;
                                        $category=$_GET['brands_Id'];
                                    
                                        $run="SELECT * FROM `products table` as P INNER join category_table as C on P.Category_Id=C.Category_Id  WHERE `Status`= 1 and P.Category_Id=$category ORDER by Product_Id DESC limit $offset,$limit; ";
                                        $rerun=mysqli_query($connect,$run) or die("Fail");
                                        if(mysqli_num_rows($rerun)>0){
                                            while($row1=mysqli_fetch_assoc($rerun)){
                                                ?>
                                                  <div class="col-md-15 col-lg-10 col-xl-6">
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
                                        ?>
                                          <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                    <?php
                                    $pageination="SELECT * FROM `products table` WHERE `Status`= 1 and Category_Id=$category;";
                                    $pageination1=mysqli_query($connect,$pageination) or die("Fail");
                                   $totalrec=mysqli_num_rows($pageination1);
                                   $totalpage=ceil($totalrec/$limit);
                                   if($page >1){
                                    echo '<a href="shop.php?brands_Id='.$category.'&page='.($page -1).'" class="rounded">&laquo;</a>';
                                   }

                                   for ($i=1; $i <= $totalpage; $i++) { 
                                    if($page ==$i){
                                        $active="active";
                                    }
                                    else{
                                        $active="";
                                    }
                                    echo '<a href="shop.php?brands_Id='.$category.'&page='.$i.'" class="'.$active.' rounded">'.$i.'</a>';
                                   }
                                   if($page < $totalpage){
                                    echo ' <a href="shop.php?brands_Id='.$category.'&page='.($page +1).'" class="rounded">&raquo;</a>';
                                   }
                                   ?>
                                   
                                    
                                            
                                           
                                   </div>
                               </div>
                               <?php
                               
                         
                                       
                                
                                        
                                    }else{

                                        $limit=6;
                                        if(isset($_GET['page'])){
                                            $page=$_GET['page'];
                                        }
                                        else{
                                            $page=1;
                                        }
                                        $offset=($page - 1)*$limit;
                                        $all="SELECT * FROM `products table`  WHERE `Status` =1 limit $offset,$limit ";
                                        $getall=mysqli_query($connect,$all) or die("fail");
                                        if(mysqli_num_rows($getall)>0){
                                            while($row2=mysqli_fetch_assoc($getall)){
                                                ?>
                                                <div class="col-md-15 col-lg-10 col-xl-6">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="../Admin/img/<?=$row2['Image']?>" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?=$row2['Product_Name']?></h4>
                                                    <p><?=$row2['Description']?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs. <?=$row2['Price']?> PKR</p>
                                                        <a href="shop-detail.php?product_id=<?= $row2['Product_Id'] ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                    <?php
                                    $pageination="SELECT * FROM `products table` WHERE `Status`= 1";
                                    $pageination1=mysqli_query($connect,$pageination) or die("Fail");
                                   $totalrec=mysqli_num_rows($pageination1);
                                   $totalpage=ceil($totalrec/$limit);
                                   if($page >1){
                                    echo '<a href="shop.php?page='.($page -1).'" class="rounded">&laquo;</a>';
                                   }

                                   for ($i=1; $i <= $totalpage; $i++) { 
                                    if($page ==$i){
                                        $active="active";
                                    }
                                    else{
                                        $active="";
                                    }
                                    echo '<a href="shop.php?page='.$i.'" class="'.$active.' rounded">'.$i.'</a>';
                                   }
                                   if($page < $totalpage){
                                    echo ' <a href="shop.php?page='.($page +1).'" class="rounded">&raquo;</a>';
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
        </div>
                                </div>
        <!-- Fruits Shop End-->


           
    </body>
    <?php
    include "../footer.php";
    ?>


</html>