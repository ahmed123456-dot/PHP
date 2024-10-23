<?php
require "../Admin/config.php";
include "nav.php";
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']){
    $custamer_id=$_SESSION['Customer_Id'];
    $name=$_SESSION['Customer_Name'];
    
    if(isset($_POST['sendfeedback'])){

  

    $date=$_POST['Date'];
    $feedback=$_POST['Feedback'];
    $cust_name=$_POST['name'];

    $insert="INSERT INTO `feedbacks_table`(`Customer_Id`, `Feedback_Date`, `Feedback_text`,`Name`) VALUES ('$custamer_id','$date','$feedback','$cust_name')";
    $run=mysqli_query($connect,$insert) or die("Fail");
    if($run){
        echo "<script>alert('Feedback Insert Successfully') 
            window.location.href='testimonial.php'</script>  ";
       
    }
    else{
        echo "<script>alert('Feedback Not Insert ') 
            window.location.href='testimonial.php'</script>  ";
    }
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
                            <a href="testimonial.php" class="nav-item nav-link active ">Feedbacks</a>
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


        
        <div class="container-fluid py-5 mt-5 ">
        <h1 class=" ahmed text-center text-dark display-3 py-5">Feedbacks Page</h1>
            <div class="container w-100 bg-dark p-5 ">
                
                <form action="" method="post" >
                
                    <div class="row ">
                    <h5 class="idrees mb-4  text-primary display-4 fw-semibold" style=" text-transform:uppercase;">Your Feedback </h1>
                        
                       
                    <input  class="format py-4 text-light " type="hidden" name="name"  placeholder="DD/MM/YY" value="<?php echo $name?>"> 
                    <div class="form-item">
                        <label class="form-label py-2 text-secondary"> Date <sup class="text-primary">*</sup></label> <br>
                                 <input  class="format py-4 text-light " type="text" name="Date"  placeholder="DD/MM/YY" value="<?php echo date('j \- F - Y ')?>" required > 
                              </div>
                        <div class="form-item">
                        <label class="form-label py-2 mt-2 text-secondary">Feedback<sup class="text-primary">*</sup></label> <br>
                        <textarea class="format py-4 text-light" name="Feedback" style="height: 100px;  resize: none;" type="text" class="form-control boxed" placeholder="Enter Your Product Feedback...!" ></textarea> 
                              </div>
                         <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                                <button type="submit" name="sendfeedback" class="btn border-secondary py-3 px-4 text-uppercase w-50 text-primary">Send Feedback</button>
                            </div>
                        
                    </div>
                </form>
            </div>
        </div>
        

        <!-- Tastimonial Start -->
        <div class="container-fluid testimonial mt-5 py-5">
            <div class="container py-5">
                
                <div class="testimonial-header text-center">
                    <h4 class="text-primary">Our Feedbacks</h4>
                    <h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
        
                
                        <?php
                        $runfeedback="SELECT * FROM `feedbacks_table`";
                        $feebackquery=mysqli_query($connect,$runfeedback) or die("Fail");
                        if(mysqli_num_rows($feebackquery)>0){
                            ?>
            
                
                         
                            <?php
                            while($row=mysqli_fetch_assoc($feebackquery)){
                                ?>
                               
                <div class=" testimonial-item bg-light rounded p-4">
                                    <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0"><?=$row['Feedback_text']?></p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark"><?=$row['Name']?></h4>
                                    <p class="m-0 pb-3"><?=$row['Feedback_Date']?></p>
                                    <div class="d-flex pe-5">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        
                            
                            
                        
           
                                <?php
                            }
                            ?>
                            
                   
                    
        
                            <?php

                        }
                        ?>
                        
                    
                        </div>  
            </div>
            </div>
                             
            
                    
                
        <!-- Tastimonial End -->


       
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