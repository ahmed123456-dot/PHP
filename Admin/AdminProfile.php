<?php
require "config.php";
include "../index/nav.php";


session_start();
if(isset($_SESSION['isadmin'] ) && $_SESSION['isadmin']){
?>
<style>
        .radius{
            border: none !important;
    border-bottom: 1px solid #ffb524 !important;
   
    outline: none !important;
    width: 100%;
    
        }
        .img-fluid{
            height: 300px;
            border-bottom-right-radius:500px;
            border-bottom-left-radius:500px;
            border-top-right-radius:500px;
            border-top-left-radius:500px;
            
            
        }
        .top{
            margin-top: 7%;
     width:60%;
     text-align: center ;
     margin-left:20%;
     height:370px;
     

        }
        .disp{
            font-size:200%;
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
                <a href="itemslist.php" class="breadcrumb-item text-white ">Product List</a>
                <a href="item-editor.php" class="breadcrumb-item text-white">Add Product</a>
                <a href="updatepage.php" class="breadcrumb-item  text-white">Update</a>
                <a href="delete.php" class="breadcrumb-item text-white ">Delete</a>
                <a href="trash.php" class="breadcrumb-item text-white">Trash Product </a>
                <a href="ordertable.php" class="breadcrumb-item text-white">Order Table </a>
                <a href="Paymenttable.php" class="breadcrumb-item text-white">Payment Details</a>
                <a href="AdminProfile.php" class="breadcrumb-item ">Admin Profile </a>
            </ol>
        </div>
        <!-- Contact Start -->
        <div class="container-fluid contact py-5 ">
            <div class="container py-5 ">
                <div class="p-5  rounded  ">
                    <div class="row g-4">

                    <div class="col-lg-7 mb-5 py-5  w-40 bg-dark  ">
                    <div class=" top border-secondary">
                                <img src="../index/img/adminphoto.jpg" class="img-fluid " alt="">
                                <div class="px-4 py-3 rounded-bottom">
                                    
                                        <h5 class="text-primary disp"><?= $_SESSION['name']?></h5>
                                       
                                    
                                </div>
                            </div> 
                            
                        </div>
                        <div class="form col-lg-5 mb-5 bg-dark ">
                            <h2>Admin Profile</h2>
                            <form class="contactForm">
                              
                            <div class="form-group py-3 radius">
                                <h3 class="text-left  text-secondary ">Name :  </h3> 
                                <h4 class="text-left py-3 text-white "> <?= $_SESSION['name']?></h3>
                                </div>
                      
                                <div class="form-group py-3 radius">
                                <h3 class="text-left  text-secondary ">E-Mail :  </h3> 
                                <h4 class="text-left py-3 text-white "><?= $_SESSION['email']?></h3>
                                </div>
                      
                                <div class="form-group py-3 radius">
                                <h3 class="text-left  text-secondary ">Password :  </h3> 
                                <h4 class="text-left py-3 text-white "><?= $_SESSION['password']?></h3>
                                </div>
                      
                                <div class="form-group py-3 radius">
                                <h3 class="text-left  text-secondary ">Role :  </h3> 
                                <h4 class="text-left py-3 text-white "><?= $_SESSION['employeerole']?></h3>
                                </div>
                                <div class="form-group py-3 radius">
                                <h3 class="text-left  text-secondary ">Logout :  </h3> 
                                <a href="logout.php" class="btn btn-danger  px-4 py-3 rounded-pill active text-primary w-100">LOGOUT PROFILE </a>
                                </div>
                            </form>
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

         
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

