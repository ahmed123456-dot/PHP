<?php

require "../Admin/config.php";
include "nav.php";

session_start();
if(isset($_SESSION['user'])){
    $customer_Id=$_SESSION['Customer_Id'];
    $customer_Name=$_SESSION['Customer_Name'];
    $total=$_SESSION['total_amount'];
   

    

function generateOrderNumber() {
    // Get the current timestamp
    $timestamp = time();

    // Generate a random component
    $randomComponent = mt_rand(100000, 999999);

    // Combine timestamp and random component to create a unique order number
    $orderNumber = $timestamp . $randomComponent;

    // Ensure the order number is exactly 16 digits long
    $orderNumber = substr($orderNumber, 0, 16);

    return $orderNumber;
}

// Example usage
$orderNumber = generateOrderNumber();
// echo "Generated Order Number: $orderNumber";




    if(isset($_POST['placeorder'])){
        $order_date=$_POST['order_date'];
        $order_code=$_POST['order_code'];
        $delivery_type=$_POST['delivery_type'];
        $payment_type=$_POST['payment_type'];


        $check="INSERT INTO `order_tale`(`Customer_Id`, `Order_Date`, `Delivery_type`, `Payment_type`, `Order_Code`) VALUES ('$customer_Id','$order_date','$delivery_type','$payment_type','$order_code')";
        $runcheck=mysqli_query($connect,$check) or die("Fail");
        if($runcheck){
            if($payment_type !="VPP"){
                echo "<script>alert('Order Placed Successfully') 
                window.location.href='process_payment.php'</script>  ";
            }
            else{
                $query="DELETE FROM `cart_table` WHERE Customer_Id=$customer_Id;";
                $run=mysqli_query($connect,$query) or die("Fail");
                if($run){

                 echo "<script>alert('Order Placed Successfully') 
                                    window.location.href='index.php'</script>  ";}
            }
            $_SESSION['ordercode']=$order_code;
            $_SESSION['payment_type']=$payment_type;
           
        }
        else{
            echo "<script>alert('Something Went Wrong. Please Try Again ') 
                                    window.location.href='chackout.php'</script>  ";
        }
        


// unset($customer_Id);

    }



    ?>
<style>
        .tab{
            margin-top:5%;
            width:80%;
            
            justify-content: center;


        }
        
        .card{
            border: none;
        }
        label{
           
            font-size:120%;
            
        }
        .format{
            border: none !important;
    border-bottom: 1px solid #81c408 !important;
   
    outline: none !important;
    width: 83%;

        }
        .ahmed{
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


    <!-- Single Page Header start -->
    
        <!-- Single Page Header End -->


        <!-- Checkout Page Start -->
        <div class="container-fluid py-5 mt-5">
        <h1 class=" ahmed text-center text-dark display-3 py-5">Place Your Order</h1>
            <div class="container ">
                
                <form action="" method="post">
                
                    <div class="row g-5">
                    
                        <div class="col-md-12 col-lg-6 col-xl-7">
                        <h1 class="mb-4 text-primary">Billing details</h1>
                        
                            
                        <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Customer Name <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 " type="text" name="customer_name" class="form-control boxed" placeholder="Your Name ...!" value="<?php echo $customer_Name ?>" > 
                              </div>
                        <div class="form-item">
                        <label class="form-label  py-2 text-secondary"> Order Date <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4" type="tell" name="order_date" class="form-control boxed" placeholder="Date...!" value="<?php echo date(' jS \- F - Y ')?>" > 
                              </div>
                              <div class="form-item">
                       
                                 <input  class="format py-4" type="hidden" name="order_code" class="form-control boxed" placeholder="Code...!" value="<?=$orderNumber?>" > 
                              </div>
                            <div class="form-item">
                            <label class="form-label  py-2 text-secondary"> Delivery Type <sup class="text-primary">*</sup></label> <br>
                            <div class="col-sm-10 ">
                                    <select  class="format py-4 w-100" name="delivery_type" id="delivery_type" required>
                                        <option value="" selected disabled class="text-dark">Select Delivery Type</option>
                                    
                                            <option class=" col-lg-2 col-md-4 col-sm-6 text-dark">Home Delivery</option>
                                            <option class=" col-lg-2 col-md-4 col-sm-6 text-dark">Pick Up</option>
                                                
                                    </select>
                                </div>
                              </div>
                            <div class="form-item">
                            <label class="form-label  py-2 text-secondary"> Payment Type <sup class="text-primary">*</sup></label> <br>
                            <div class="col-sm-10 ">
                                    <select  class="format py-4 w-100  boxed" name="payment_type" id="payment_type" required>
                                        <option value="" selected disabled class="col-lg-2 col-md-4 col-sm-6 text-dark">Select Payment Type</option>
                                    
                                            <option class="col-lg-2 col-md-4 col-sm-6 text-dark" value="Card">Card</option>
                                            <option class="col-lg-2 col-md-4 col-sm-6 text-dark" value="Cheque">Cheque</option>
                                            <option class="col-lg-2 col-md-4 col-sm-6 text-dark" value="VPP">VPP (Cash on Delivery)</option>
                                                
                                    </select>
                                </div> 
                              </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-5">
                        <h1 class="mb-4 text-primary">Products</h1>
                            <div class="table-responsive">
                            <?php
$getcard="SELECT * FROM `cart_table` as C INNER join `products table` as P  on C.Product_Id= P.Product_Id where C.Customer_Id=$customer_Id";
$run=mysqli_query($connect,$getcard) or die("Fail");

?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Products</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Total</th>

                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                        if(mysqli_num_rows($run)>0){
                            
                           while($row=mysqli_fetch_assoc($run)){
                           
                           
                            
                            ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="../Admin/img/<?=$row['Image'] ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5"><?=$row['Product_Name'] ?></td>
                                            <td class="py-5"><?=$row['Price'] ?></td>
                                            <td class="py-5"><?=$row['Quantity'] ?></td>
                                            <td class="py-5"><?=$row['Total'] ?></td>
                                        
                                        </tr>
                                       
                                        
                                        
                                    
                                        <?php
                           }
                           
                        
                                        ?> <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Total</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark"><?=$total?></p>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                           }
                           
                        
                                        ?>
                                    </tbody>
                                    
                                        
                                </table>
                            </div>
                            
                            

                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" name="placeorder" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->


         
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