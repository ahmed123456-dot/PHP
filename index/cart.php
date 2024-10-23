<?php

require "../Admin/config.php";
include "nav.php";

session_start();
if(isset($_SESSION['user'])){
    
    $customer_Id=$_SESSION['Customer_Id'];





    ?>
<style>
        
        .ahmed{
                margin-top: 3%;
                text-transform: uppercase;
                letter-spacing: 0.2ch;
                font-family:  'Open Sans', 'Helvetica Neue';
                
            }
        .tab{
            margin-top:5%;
            width:80%;
            
            justify-content: center;


        }
        .thhh{
           font-size:150%;
           border-color: black;
           padding: 50px;
           text-transform: uppercase;
          
           
           border-radius: 50%;
        }
        .row{
            justify-content: center;
        }
        .table-hover{
            margin-top:5%;
            border: none !important;
    border-bottom: 1px solid #ffb524 !important;
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
                            <a href="shop.php" class="nav-item nav-link text-secondary">Shop</a>
                            <a href="testimonial.php" class="nav-item nav-link text-secondary">Feedbacks</a>
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


        


       

        <!-- Cart Page Start -->
        <div class="container-fluid py-5 ">
            
            <div class="container py-5 ">
            <h1 class="mb-4 ahmed text-center display-4 py-2">Selected Products</h1>

                <div class="table-responsive">
<?php
$total=0;
$discount=0;
$getcard="SELECT * FROM `cart_table` as C INNER join `products table` as P  on C.Product_Id= P.Product_Id where C.Customer_Id=$customer_Id";
$run=mysqli_query($connect,$getcard) or die("Fail");

?>

 
         
<table class="table table-hover">
                        <thead>
                          <tr class="thhh">
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(mysqli_num_rows($run)>0){
                            
                           while($row=mysqli_fetch_assoc($run)){
                           
                            
                            ?>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="../Admin/img/<?=$row['Image'] ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?=$row['Product_Name'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?=$row['Price'] ?></p>
                                </td>
                               <td>
                                    <p class="mb-0 mt-4"><?=$row['Quantity'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?=$row['Total'] ?></p>
                                </td>
                                <td>
                                    <a href="deletecartitem.php?item_id=<?= $row['Product_Id'] ?>" class="btn btn-md rounded-circle bg-light border mt-4" >
                                        <i class="fa fa-times text-danger"></i>
                           </a>
                                </td>
                            
                            </tr>
                            <?php
                            $discount= 1 ;
                            $total +=$row['Total'];
                            
                            } 
                        } 
                           
                        ?>
                        </tbody>
                    </table>
               
                    </div>
                <div class="mt-5">
                    <a href="shop.php" class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Add More Products</a>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                               

                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0"><?=$total ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Sale Tax</h5>
                                    <div class="">
                                        <p class="mb-0"><?=$discount?>%</p>
                                    </div>
                                </div>
                                <?php
                                $nettotal=$total*$discount/100;
                                ?>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4"><?=$total+$nettotal?></p>
                               <?php
                               $_SESSION['total_amount']=$total+$nettotal;
                               ?>
                            </div>
                            
                            <a href="chackout.php" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</a>
                        <?php
                      
                                ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Page End -->


       
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