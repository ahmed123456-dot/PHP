<?php

require "../Admin/config.php";
include "nav.php";

session_start();
if(isset($_SESSION['user']) ){
    $customer_Id=$_SESSION['Customer_Id'];
    $ordercode= $_SESSION['ordercode'];
    $total=$_SESSION['total_amount'];
    $paymenttype= $_SESSION['payment_type'];
    
    $getOrderID="SELECT Order_Id FROM `order_tale` WHERE Order_Code=$ordercode;";
    $getOrderID_run=mysqli_query($connect, $getOrderID) or die("failed");
    $row=mysqli_fetch_assoc($getOrderID_run);
    $order_id=$row['Order_Id'];
    
    if(isset($_POST['senddetails'])){
        $holder=$_POST['Holder_Name'];
        $cardnumber=$_POST['Card_Number'];
        $expiredate=$_POST['Expire_Date'];
        $cvc=$_POST['CVC'];

        
        
        $check="INSERT INTO `customer_card_details`(`Holder_Name`, `Card_No`, `Expiry`, `CVC`, `Customer_Id`, `Order_Code`) VALUES ('$holder','$cardnumber','$expiredate','$cvc','$customer_Id','$ordercode')";
        $runcheck=mysqli_query($connect,$check) or die("Fail");
        if($runcheck ){
            $payment="INSERT INTO `payments table`(`Order_Id`, `Customer_Id`,`Payment_Amount`, `Payment_type`) VALUES ('$order_id','$customer_Id','$total','$paymenttype')";
            $runpayment=mysqli_query($connect,$payment) or die("Fail");
            if($runpayment){
                $query="DELETE FROM `cart_table` WHERE Customer_Id=$customer_Id;";
                $run=mysqli_query($connect,$query) or die("Fail");
                if($run){
            
            echo "<script>alert('Payment Recieved') 
            window.location.href='index.php'</script>  ";
        }
        }
           
        }
        else{
            echo "<script>alert('Something Went Wrong. Please Try Again ') 
                                    window.location.href='chackout.php'</script>  ";
        }



// unset("total_amount");

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
    width: 100%;
    background-color:#45595b;

        }
        .ahmed{
                text-transform: uppercase;
                letter-spacing: 0.2ch;
                font-family:  'Open Sans', 'Helvetica Neue';
                
            }.idrees{
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
        <div class="container-fluid py-5 mt-5 ">
        <h1 class=" ahmed text-center text-dark display-3 py-5">Payment Details</h1>
            <div class="container w-50 bg-dark p-5 ">
                
                <form action="" method="post" >
                
                    <div class="row ">
                
                        <div class="">
                        <h5 class="idrees mb-4  text-primary display-4 fw-semibold" style=" text-transform:uppercase;">Card Details </h1>
                            
                        <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Holder Name <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 text-light " type="text" name="Holder_Name"  placeholder="Holder Name ...!" required> 
                              </div>
                        <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Card Number <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 text-light " type="text" name="Card_Number"  placeholder="Card Number ...!" required minlength=16 maxlength=16  > 
                              </div>
                        <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Expire Date <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 text-light " type="date" name="Expire_Date"  placeholder="DD/MM/YY" required > 
                              </div>
                              <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Card Verification Code <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 text-light" type="text" name="CVC"  placeholder="XXXX" required minlength=4 maxlength=4 > 
                              </div>
        </div>
                            
                            

                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" name="senddetails" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Pay Now</button>
                            </div>
                        
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->



    </body>
    <?php
    include "../footer.php"
    ?>

</html>
<?php
}else{
    header("Location: login.php");
}
?>

