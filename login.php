<?php  



if(!isset($_COOKIE['login'])) {
  } else {
    echo "<script>window.open('accounts.php','_self')</script>";
  }

  if(isset($_POST['submit'])){
    include ('db.php');
    $user_name =$_POST['username'];
    $password=md5($_POST['password']);
    
    $stmt_c = $conn->prepare("SELECT count(*) as c FROM `user` WHERE  `user_name`= :user_name and `password`=:password;");
    $stmt_c->execute(array(':user_name' => $user_name,':password' => $password));
    $row_count = $stmt_c->fetch(PDO::FETCH_ASSOC);
    // echo password_verify('sa','$2y$10$WkebpA6hRJNIuI7hTK1N9eVpG');
    // if( password_verify($password,$row_count['password'] ) ){
    if( $row_count['c'] ){

        $code_cookie = password_hash($password . rand(10000,100000), PASSWORD_DEFAULT);
        setcookie('login', $code_cookie, time() + (86400 * 30), "/");

        $stmt = $conn->prepare("UPDATE `user` SET `login_code`= :login_code WHERE `user_name` = :user_name and `password` = :password");
        $stmt->execute(array(':user_name' => $user_name,':password' => $password,':login_code' => $code_cookie));

        echo "<script>window.open('accounts.php','_self')</script>";
    }
    else{
        echo "<script>window.open('login.php','_self')</script>";
    }


}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Author -->
    <meta name="author" content="Themes Industry">
    <!-- description -->
    <meta name="description" content="Food Delivery is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords" content="Food Delivery, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq">
    <!-- Page Title -->
    <title> Food Delivery | Login</title>
    <!-- Favicon -->
    <link href="" rel="icon">
    <!-- Bundle -->
    <link href="vendor/css/bundle.min.css" rel="stylesheet">
    <!-- Plugin Css -->

    <link href="css/line-awesome.min.css" rel="stylesheet">
    <link href="vendor/css/revolution-settings.min.css" rel="stylesheet">
    <link href="vendor/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="vendor/css/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/css/cubeportfolio.min.css" rel="stylesheet">
    <link href="vendor/css/LineIcons.min.css" rel="stylesheet">
    <link href="css/slick-theme.css" rel="stylesheet">
    <link href="css/slick.css" rel="stylesheet">
    <link href="vendor/css/wow.css" rel="stylesheet">

    <!-- Style Sheet -->
    <link href="css/nouislider.min.css" rel="stylesheet">
    <link href="css/range-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

<!-- Preloader -->
<div class="preloader">
    <div class="center">
        <div class="spinner">
            <div class="blob top"></div>
            <div class="blob bottom"></div>
            <div class="blob left"></div>
            <div class="blob move-blob"></div>
        </div>
    </div>
</div>
<!-- Preloader End -->



<!--login start-->
<section class="p-lg-0 login-sec">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-6 order-2 position-relative d-flex align-items-center bg-1">


                <div class="login-content text-center text-lg rtl">

                    <!--logo-->
                    <div class="float-middle-logo">
                        <a class="navbar-brand link" href="index.php">
                            <img src="img/logo.png" class="" alt="logo">
                        </a>
                    </div>
                    <!--title-->
                    <div class="title d-inline-block mb-4">
                        <h3 class="mb-3 heading">???????? ??????????</h3>
                        <p class="text">???? ?????????? ???? ???????? ?????? ?????? ?????????????? ?????????? ???????? ?????? ?????? ????????</p>
                    </div>

                    <!--form-->
                    <form method="post" action="" class="rtl">
                        <input class="form-control" type="text" name="username" placeholder="?????? ????????????" required="">
                        <input class="form-control" type="password" name="password" placeholder="?????? ????????" required="">
                       
                            <button name="submit" type="submit" class="btn btn-large rounded-pill main-btn">????????</button>
                            <a href="registeration.php" class="text">???????? ?????? ?????? ?????????? ????</a>
                         <div class="form-button"></div>
                    </form>
                </div>

                <!--bottom nav start-->
                <div class="bottom-mini-nav">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-12 simple-navbar d-flex align-items-center justify-content-start">
                            <nav class="navbar rtl">
                                <a class="nav-link link"  href="index.php">????????</a></a>
                                <a class="nav-link link"  href="restaurant-listing.php">???????? ??????????????</a>
                                <a class="nav-link link"  href="login_admin.php">???????? ???? ?????? ????????????</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--bottom nav end-->
            </div>
            <div class="col-12 col-lg-6 order-1 p-0 login-side-background" style="background-image: url('img/login-half-block.jpg');">
                <!--Feature Image Half-->
            </div>
        </div>


    </div>
</section>
<!--login end-->



<!-- JavaScript -->
<script src="vendor/js/bundle.min.js"></script>
<!-- Plugin Js -->
<script src="vendor/js/jquery.fancybox.min.js"></script>
<script src="vendor/js/owl.carousel.min.js"></script>
<script src="vendor/js/parallaxie.min.js"></script>
<script src="vendor/js/wow.min.js"></script>
<!-- REVOLUTION JS FILES -->
<script src="vendor/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/js/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="vendor/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.migration.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendor/js/extensions/revolution.extension.video.min.js"></script>
<!--Tilt Js-->
<script src="vendor/js/TweenMax.min.js"></script>
<!-- custom script-->
<script src="js/nouislider.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="vendor/js/contact_us.js"></script>
<script src="js/script.js"></script>

</body>
</html>