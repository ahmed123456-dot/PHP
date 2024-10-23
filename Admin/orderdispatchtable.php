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
      
        .image{
            width:50px;
            height:50px;
            border-radius:10px;
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
    border-bottom: 2px solid #ffb524 !important;
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
                            <form action="orderdispatchtable.php" role="search" method="get">
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
                <a href="ordertable.php" class="breadcrumb-item ">Order Table </a>
                <a href="Paymenttable.php" class="breadcrumb-item text-white">Payment Details</a>
                <a href="AdminProfile.php" class="breadcrumb-item text-white">Admin Profile </a>
                
            </ol>
            
        </div>
        <div class="container-fluid py-3 bg-dark ">
        <ol class="breadcrumb justify-content-center  mb-0 ">
                
                <a href="ordertable.php" class="breadcrumb-item text-white ">PENDING </a>
                <a href="orderdispatchtable.php" class="breadcrumb-item ">DISPATCH</a>
                <a href="ordershipped.php" class="breadcrumb-item text-white">SHIPPED</a>
            </ol>
    </div>
    <?php
    if(isset($_GET['Add'])){
        $search=$_GET['Add'];
        $searchquery="SELECT * FROM `order_tale` as O WHERE `Order_Status`= 'Dispatch' and O.Order_Id LIKE '%$search%' or O.Order_Date LIKE '%$search%' or  O.Delivery_type LIKE '%$search%' or  O.Payment_type LIKE '%$search%' ;";
        $searchrun=mysqli_query($connect,$searchquery) or die("Fail");
        if(mysqli_num_rows($searchrun)>0){
            
            
            while($runsearch=mysqli_fetch_assoc($searchrun)){
                if($runsearch['Order_Status']=='Dispatch'){

               
            ?>
             <div class="container">  
            <div class="row"> 
<table class="table table-hover">
<thead>
    <tr class="thhh text-dark py-3" >
    <th scope="col" class="">Order Id</th>
      <th scope="col">Order Date</th>
      <th scope="col">Delivery Type</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Order Status</th>
      <th scope="col">SHIPPED</th>
      
      
    </tr>
  </thead>
           <tr>
                
                <td><?=$runsearch['Order_Id'] ?></td>
                <td><?=$runsearch['Order_Date'] ?></td>
                <td><?=$runsearch['Delivery_type'] ?></td>
                <td><?=$runsearch['Payment_type'] ?></td>
                <td><?=$runsearch['Order_Status'] ?></td>
                <td>
                <?php
           echo ' <a type="button" id="ahmed" href="dispatchupdate.php?Id='.$runsearch['Order_Id'].'" class="btn btn-dark  px-3 py-2 rounded-pill text-secondary w-100">SHIPPED</a>';
           ?> </td>
            </tr>
            </table>
    </div>
    </div>
            <?php
              }   else{
                echo '<h1 class="text-center text-primary py-5" >No Products Founds Try Again <br>
                <a href="orderdispatchtable.php" class=" btn  border border-secondary px-4 py-3 rounded-pill text-primary w-50">Click Now</a> </h1>';
            }
            }
        
       

} else{
    echo '<h1 class="text-center text-primary py-5" >No Products Founds Try Again <br>
    <a href="orderdispatchtable.php" class=" btn  border border-secondary px-4 py-3 rounded-pill text-primary w-50">Click Now</a> </h1>';
}
}
        else{

        

        $limit=6;
        if(isset($_GET['page'])){
          $page=$_GET['page'];
        }
        else{
          $page=1;
        }
        $offset=($page - 1 )*$limit;
        $product="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Dispatch' limit $offset,$limit";
        $productcheck=mysqli_query($connect,$product) or die("Fail");
        if(mysqli_num_rows($productcheck)>0){
            ?>
             <div class="container">  
            <div class="row"> 
<table class="table table-hover">
<thead>
    <tr class="thhh text-dark py-3" >
    <th scope="col" class="">Order Id</th>
      <th scope="col">Order Date</th>
      <th scope="col">Delivery Type</th>
      <th scope="col">Payment Type</th>
      <th scope="col">Order Status</th>
      <th scope="col">Shipped</th>
      
    </tr>
  </thead>
            <?php
            while($row=mysqli_fetch_assoc($productcheck)){
                ?>
                <tr>
                
                    <td><?=$row['Order_Id'] ?></td>
                    <td><?=$row['Order_Date'] ?></td>
                    <td><?=$row['Delivery_type'] ?></td>
                    <td><?=$row['Payment_type'] ?></td>
                    <td><?=$row['Order_Status'] ?></td>
                    <td>
                    <?php
               echo ' <a type="button" id="ahmed" href="shippedupdate.php?Id='.$row['Order_Id'].'" class="btn btn-dark  px-3 py-2 rounded-pill text-secondary w-100">SHIPPED</a>';
               ?> </td>
                </tr>
                <?php

            }
        }
    
        ?>
         
</table>
</div>
</div>  
<div class="col-12">
    <div class="pagination d-flex justify-content-center mt-5">
        <?php
        $pageination="SELECT * FROM `order_tale` WHERE `Order_Status`= 'Dispatch';";
        $pageination1=mysqli_query($connect,$pageination) or die("Fail");
       $totalrec=mysqli_num_rows($pageination1);
       $totalpage=ceil($totalrec / $limit);
       if($page >1){
        echo '<a href="ordertable.php?page='.($page -1).'" class="rounded">&laquo;</a>';
       }

       for ($i=1; $i <= $totalpage; $i++) { 
        if($page ==$i){
            $active="active";
        }
        else{
            $active="";
        }
        echo '<a href="ordertable.php?page='.$i.'" class="'.$active.' rounded">'.$i.'</a>';
       }
       if($page < $totalpage){
        echo ' <a href="ordertable.php?page='.($page +1).'" class="rounded">&raquo;</a>';
       }
 
    }
      
    

   
        
        ?>
                                     
    </div>
    </div>

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