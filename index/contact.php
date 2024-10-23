<?php

require "../Admin/config.php";
include "nav.php";

session_start();
if(isset($_SESSION['user'])){
    $customer_Id=$_SESSION['Customer_Id'];
    $customer_Name=$_SESSION['Customer_Name'];
    $email=$_SESSION['E_Mail'];

    if(isset($_POST['sendmessage'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];

        $contact="INSERT INTO `contact_table`(`Customer_Id`, `E_Mail`, `Subject`, `Message`) VALUES ('$id','$email','$subject','$message');";
        $contactconnect=mysqli_query($connect,$contact) or die("Fail");
        if($contactconnect){
            echo "<script>alert('Message Successfully Send ') 
            window.location.href='contact.php'</script>  ";
        }else{
            echo "<script>alert('Message Not Send ') 
            window.location.href='contact.php'</script>  ";
        }
    }





?>



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
                            <a href="contact.php" class="nav-item nav-link text-primary">Contact</a>
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


       
       

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 style="text-transform: uppercase; font-style: normal; letter-spacing: 0.2ch; "class="text-primary display-1 fw-semibold ">Get in touch</h1>
                                 </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14471.869489362232!2d67.02869093413085!3d24.93318140408045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1702649185070!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="form col-lg-5 mb-5">
                            <h2>Send Message</h2>
                            <form class="contactForm" method="post">
                              <input   type="hidden" name="id"  value="<?php echo $customer_Id?>">
                              <div  class="inputBox">
                                <input   type="text" name="name"  value="<?php echo $customer_Name?>" required>
                                <span>Full Name</span>
                            </div>
                      
                            <div  class="inputBox">
                                <input  type="text" name="email"   value="<?php echo $email ?>" required> 
                                <span>Email</span>
                            </div>
                      
                            <div class="inputBox">
                                <input  type="text" name="subject" required >
                                <span>Subject</span>
                            </div>
                      
                            <div  class="inputBox">
                                <textarea  style="height: 100px;" name="message"  required ></textarea>
                                <span>Type Your Message...</span>
                            </div>
                      
                            <div class="inputBox">
                                <input type="submit" value="Send" name="sendmessage">
                            </div>
                            </form>
                          </div>
                        <div class="col-lg-7 my-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">SD-1, Block A North Nazimabad Town, Karachi, 74700</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">Apexchoise@example.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2">+92 332 2957641</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-globe fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Website</h4>
                                    <p class="mb-2">apexchoise@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


           
    </body>

</html>
<?php
include "../footer.php";

}else{
    header("Location: login.php");
}
?>
