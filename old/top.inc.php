<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.php');
date_default_timezone_set('Asia/Kolkata');
$cat_res=mysqli_query($con,"select * from categories where status=1");
$cat_arr=array();
$br_res=mysqli_query($con,"select * from brand where status=1");
$br_arr=array();
$vb_res=mysqli_query($con,"select * from vibes where status=1");
$vb_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;
}
while($row=mysqli_fetch_assoc($br_res)){
    $br_arr[]=$row;
}
while($row=mysqli_fetch_assoc($vb_res)){
    $vb_arr[]=$row;
}
$obj =new add_to_cart();
$tp=$obj->totalp();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="decription" content="Official website for the world of CALI">
    <title>CALI | HOME</title>

    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <!--Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/580abf3e91.js" crossorigin="anonymous"></script>
    <!--Slick Slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="fixed-top">
        <div class="container-fluid topbanner">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-12 loginLink">
                    <?php
                      if(isset($_SESSION['USER_S'])){
                      echo "<span >HI, ";
                      echo strtoupper($_SESSION['U_NAME']);
                      echo "</span><br>&nbsp;<a href='logout.php'>Logout</a>";
                    }
                    else{
                      echo "<a href='login.php'>Sign in</a>";
                    }
                      ?>
                </div>
                <div class="col-md-4 col-12 text-center">
                    <a href="index.php"><img src="assets/CALI_nobg_logo2.png" class="mainlogo" alt="" height="65px" >
                    </a>
                </div>
                <div class="col-md-4 col-12 text-end">
                    <p class="my-md-4 header-links">
                        <a href="myorders.php" class="px-2">
                            My <img src="assets/heart.png" alt="" height="20px"> Orders
                        </a>
                        <a href="cart.php" class="px-2">
                            <img src="assets/shopping-bag-icon.png" alt="" height="20px"><span class="no_prod"><?php echo $tp;?></span>
                        </a>
                        <?php
                      if(isset($_SESSION['USER_S'])){
                      echo "<a href='myaccount.php' class=px-2>
                            My Account
                        </a>";
                        }?>
                        
                    </p>
                </div>
            </div>
        </div> 
        <div class="container" style="border-bottom: 0.2px solid rgba(139, 139, 139, 0.63);"></div>
        <!--navbar-->
        <div class="container-fluid linkbanner px-5">
            <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="aboutus.php">
                        ABOUT US
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        CATEGORIES
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php foreach ($cat_arr as $list) { ?>
                        <li><a class="dropdown-item" href="categories.php?id=<?php echo $list['id'];?>"><?php echo $list['categories']; ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        BRANDS
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php foreach ($br_arr as $list) { ?>
                        <li><a class="dropdown-item" href="brand.php?id=<?php echo $list['id'];?>"><?php echo $list['brand']; ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        VIBES
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php foreach ($vb_arr as $list) { ?>
                        <li><a class="dropdown-item" href="vibes.php?id=<?php echo $list['id'];?>"><?php echo $list['vibes']; ?></a></li>
                        <?php } ?>
                      </ul>
                    </div>
            </div>
        </div> 
    </header>