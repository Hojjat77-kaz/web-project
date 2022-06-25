<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $userPhone=$_POST['userPhone'];
    $userEmail=$_POST['userEmail'];
    $userPass=$_POST['userPass'];
    include ('db.php');
    // $hashed_password = password_hash($userPass, PASSWORD_DEFAULT);
    $hashed_password = md5($userPass);
    $code_cookie = password_hash($userPass . rand(10000,100000), PASSWORD_DEFAULT);
    $stmt_insert = $conn->prepare("INSERT INTO `user`(`user_name`, `password`, `login_code`, `email`, `phone`) VALUES (:user_name ,:password ,:login_code ,:email ,:phone)");
    $stmt_insert->execute(array(':user_name' => $username,':password' => $hashed_password,':login_code' => $code_cookie,':email' => $userEmail,':phone' => $userPhone));

    if($stmt_insert)
    {
        $cookie_name = "login";
        // setcookie($cookie_name, $code_cookie, time() + (86400 * 30), "/");
        setcookie('login', $code_cookie, time() + (86400 * 30), "/");
        echo "<script>window.open('accounts.php','_self')</script>";
    }
    else{

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
    <title> Food Delivery | Register</title>
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
            <div class="col-12 col-lg-6 order-2 order-lg-1 position-relative d-flex align-items-center bg-1">
                <div class="login-content text-center text-lg rtl">

                    <!--logo-->
                    <div class="float-middle-logo">
                        <a class="navbar-brand link" href="index.php">
                            <img src="img/logo.png" class="" alt="logo">
                        </a>
                    </div>

                    <!--title-->
                    <div class="title d-inline-block mb-4">
                        <h3 class="mb-3 heading">ثبت نام</h3>
                    </div>

                    <!--form-->
                    <form method="post" action="" name="register">
                       <div class="row">
                           <div class="col-12 col-lg-6">
                               <input class="form-control" type="text" name="username" placeholder="اسم کاربری" required="">
                           </div>
                           <div class="col-12 col-lg-6">
                               <input class="form-control" type="text" name="userPhone" placeholder="شماره تماس" required="">
                           </div>
                           <div class="col-12">
                               <input class="form-control" type="text" name="userEmail" placeholder="آدرس ایمیل" required="">
                           </div>
                           <div class="col-12">
                               <input class="form-control" type="text" name="userPass" placeholder="رمز عبور" required="">
                           </div>
                       </div><input  type="submit" name="submit" value="ثبت نام"/>
                        <div class="form-button">
                            
                        </div>
                    </form>
                </div>
                <!--bottom nav start-->
                <div class="bottom-mini-nav rtl">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-12 simple-navbar d-flex align-items-center justify-content-start">
                            <nav class="navbar">
                                <a class="nav-link link" href="index.php">خانه</a></a>
                                <a class="nav-link link" href="restaurant-listing.php">لیست رستوران</a>
                                <a class="nav-link link" href="accounts.php">حساب کاربری</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--bottom nav end-->
            </div>
            <div class="col-12 col-lg-6 p-0 order-1 order-lg-2 login-side-background" style="background-image: url('img/reg-half-block.jpg');">
                <!--Feature Image Half-->
            </div>
        </div>


    </div>
</section>
<!--adress end-->

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