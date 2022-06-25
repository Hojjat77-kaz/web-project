<?php

include ('db.php');
if(isset($_COOKIE['login'])){

$cookie = $_COOKIE['login'];
$stmt = $conn->prepare("SELECT count(*) as 'c' FROM `cart` WHERE `user_id`= (SELECT id FROM `user` WHERE `login_code`= :cookie) and count > 0");
$stmt->execute(array(':cookie' => $cookie));
$row_count = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $row_count['c'];
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
    <title> Food Delivery | Home</title>
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
    <link href="css/select2.min.css" rel="stylesheet">
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

<!--Header Start-->
<header id="home" class="cursor-light">

    <div class="inner-header nav-icon">
        <div class="main-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <a class="navbar-brand link" href="index.php">
                            <img src="img/logo.png" class="" alt="logo">
                        </a>
                    </div>
                    <div class="col-lg-6 simple-navbar d-none d-lg-flex align-items-center justify-content-center">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav ml-auto mr-auto">
                                    <a class="nav-link link" href="accounts.php">حساب کاربری</a>
                                    <a class="nav-link link" href="restaurant-listing.php">لیست رستوران ها</a>
                                    <a class="nav-link link" href="index.php">خانه</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center justify-content-end">
                        <ul class="user-links">
                            <li class="header-shop-cart"><a href="javascript:void(0);" class="line-icon position-relative link"><i class="las la-shopping-bag"></i><span class="badge rounded-circle"><?php if(isset($_COOKIE['login'])) echo $count ?></span></a>
                            <div class="minicart link">
                                    <div class="minicart-content">
                                    <?php
                                    if(isset($_COOKIE['login'])){
                                    $cookie = $_COOKIE['login'];
                                    $stmt = $conn->prepare("SELECT food.id ,`food`.`name` , food.`price` , `cart`.`count` ,`user_id`,`restaurant`.`image`,food.restaurant_id FROM `cart` INNER JOIN food ON `cart`.`food_id` = `food`.id INNER JOIN restaurant on food.restaurant_id = restaurant.id WHERE `user_id`= (SELECT id FROM `user` WHERE `login_code`= :cookie)");
                                    $stmt->execute(array(':cookie' => $cookie));
                                    $amount = 0;
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $price = $row['price'];
                                        $count = $row['count'];
                                        $user_id = $row['user_id'];
                                        $image = $row['image'];
                                        $restaurant_id = $row['restaurant_id'];
                                        $amount += $row['price'];
                                        if($count <= 0)
                                        continue;
                                        if($count <= 0)
                                        continue;

                                    ?>
                                        <div class="row">
                                            <div class="cart-img col-5">
                                                <a href="#">
                                                    <img src="<?php echo $image ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="cart-content col-6">
                                                <h4>
                                                    <a href="#"><?php echo $name ?></a>
                                                </h4>
                                                <div class="cart-price">
                                                    <span class="new">تومان<?php echo $price ?></span>
                                                </div>
                                                <div class="number">
                                                    <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter="  target="_self">-</a>
                                                    <input type="text" value="<?php echo $count ?>"/>
                                                    <a href= "add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">+</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} ?>
                                    </div>
                                    <ul class="ml-0">
                                        <li>
                                            <div class="total-price">
                                                <span class="f-right">تومان<?php if(isset($_COOKIE['login'])) echo $amount ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkout-link">
                                                <a href="#" class="main-btn rounded-pill" id="checkout-btn">پرداخت</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-menu-cart"><a href="javascript:void(0);" class="fa-icon link"><i class="far fa-user"></i><span><i class="las la-angle-down ml-1"></i></span></a>
                                <div class="menu-links link">
                                    <ul>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="login.php"><i class="lni lni-key"></i>ورود</a>
                                        </li>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="registeration.php"><i class="lni lni-pointer-right"></i>ثبت نام</a></li>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="accounts.php"><i class="lni lni-user"></i>حساب کاربری</a></li>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="logout.php"><i class="lni lni-lock"></i>خروج</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--toggle btn-->
        <a href="javascript:void(0)" class="sidemenu_btn link d-lg-none" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </div>
    <!--Side Nav-->
    <div class="side-menu hidden side-menu-opacity">
        <div class="bg-overlay"></div>
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <div class="container">
                <div class="row w-100 side-menu-inner-content">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <a href="index.php" class="navbar-brand"><img src="img/logo.png" alt="logo"></a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <nav class="side-nav w-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link scroll" href="index.php">خانه</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll" href="restaurant-listing.php">لیست رستوران</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link scroll" href="accounts.php">حساب کاربری</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-4 d-flex align-items-center">
                        <div class="side-footer text-white w-100">
                            <div class="menu-company-details">
                                <span>09130000000</span>
                                <span>Admin@gmail.com</span>
                            </div>
                            <ul class="social-icons-simple">
                                <li><a class="facebook-text-hvr" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i class="fab fa-youtube"></i> </a> </li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>

</header>
<!--Header End-->

<!--Banner Sec start-->
<section class="main-banner cursor-light bg-1" id="main-banner">
    <h4 class="d-none">عنوان</h4>
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="megaone-food-slider1" data-source="gallery" style="background:transparent;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8.1 fullscreen mode -->
        <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.8.1">
            <ul>	<!-- SLIDE  -->
                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-1-layer-2"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-170','-186','-172','-100']"
                         data-fontsize="['18','40','25','20']"
                         data-lineheight="['70','70','40','40']"
                         data-width="['none','none','280','200']"
                         data-height="['none','150','150','150']"
                         data-whitespace="nowrap"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"delay":339.84375,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:.7;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 5; white-space: nowrap; font-size: 28px; line-height: 70px; font-weight: 300;opacity: .8; color: #ffffff; letter-spacing: 0;font-family:'Roboto', sans-serif;">رستوران</div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-1"
                         id="slide-1-layer-3"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-30','-84','-97','-20']"
                         data-fontsize="['90','70','70','20']"
                         data-lineheight="['85','85','60','50']"
                         data-width="['470','670','670','400']"
                         data-height="none"
                         data-whitespace="normal"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"delay":829.8828125,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 6;font-size: 75px; line-height: 85px; font-weight: 400; letter-spacing: 0;font-family: 'Grand Hotel', cursive;"><span class="color-white">ارسال رایگان</span> </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-1-layer-4"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['133','25','60','160']"
                         data-fontsize="['15','18','18','20']"
                         data-lineheight="['30','26','26','26']"
                         data-width="['580','570','580','400']"
                         data-height="none"
                         data-whitespace="normal"

                         data-type="text"
                         data-responsive_offset="on"

                         data-frames='[{"delay":1319.921875,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:.7;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 7; min-width: 570px; max-width: 570px; white-space: normal; font-size: 18px; line-height: 26px; font-weight: 300; color: #ffffff;opacity: .8; letter-spacing: 0;font-family:'Roboto', sans-serif;">وعده های غذایی خود را سریع، گرم و با بالاترین کیفیت دریافت کنید</div>

                    <!-- LAYER NR. 5 -->
                    <!--                    ele 1-->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-1-layer-6"
                         data-x="['left','left','left','left']" data-hoffset="['-50','137','5000','5000']"
                         data-y="['top','top','top','top']" data-voffset="['250','538','642','526']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="normal"

                         data-type="image"
                         data-responsive_offset="on"

                         data-frames='[{"delay":719.921875,"speed":1500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 9;">
                        <div class="rs-looped rs-pendulum"  data-easing="" data-startdeg="-5" data-enddeg="5" data-speed="3" data-origin="80% 60%"><img src="img/slider-ele1.png" alt="" data-ww="['267px','184px','145px','145px']" data-hh="['270px','186px','146px','146px']" data-no-retina> </div></div>

                    <!-- LAYER NR. 6 -->
                    <!--                    //ele 3-->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-1-layer-8"
                         data-x="['right','right','right','right']" data-hoffset="['-230','-144','-100','-50']"
                         data-y="['middle','top','bottom','bottom']" data-voffset="['40','100','112','80']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="normal"
                         data-visibility="['on','on','off','off']"

                         data-type="image"
                         data-basealign="slide"
                         data-responsive_offset="on"

                         data-frames='[{"delay":359.9609375,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 10;"><img data-depth="0.03" src="img/slider-ele3.png" alt="" data-ww="['545px','327px','264px','174px']" data-hh="['498px','299px','251px','161px']" data-no-retina> </div>

                    <!-- LAYER NR. 10 -->
                    <!--                    ele 5-->
                    <div class="tp-caption   tp-resizeme rs-parallaxlevel-0"
                         id="slide-1-layer-13"
                         data-x="['left','center','left','left']" data-hoffset="['1025','330','396','250']"
                         data-y="['top','top','top','top']" data-voffset="['210','130','78','60']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="normal"
                         data-visibility="['on','on','off','off']"

                         data-type="image"
                         data-responsive_offset="on"

                         data-frames='[{"delay":50,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 14;">
                        <div class="rs-looped rs-pendulum"  data-easing="easeInOutQuart" data-startdeg="-5" data-enddeg="5" data-speed="5" data-origin="80% 50%"><img src="img/slider-ele5.png" alt="" data-ww="['90px','105px','105px','105px']" data-hh="['85px','103px','103px','103px']" data-no-retina> </div></div>

                    <!-- LAYER NR. 11 -->
                    <!--                    ele 4-->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-1-layer-15"
                         data-x="['left','left','left','left']" data-hoffset="['-1','-1','0','0']"
                         data-y="['bottom','bottom','bottom','bottom']" data-voffset="['10','0','0','0']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="normal"
                         data-visibility="['on','on','off','off']"

                         data-type="image"
                         data-basealign="slide"
                         data-responsive_offset="on"

                         data-frames='[{"delay":9.9609375,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['inherit','inherit','inherit','inherit']"
                         data-paddingtop="[0,0,0,0]"
                         data-paddingright="[0,0,0,0]"
                         data-paddingbottom="[0,0,0,0]"
                         data-paddingleft="[0,0,0,0]"

                         style="z-index: 15;"><img data-depth="0.05" src="img/slider-ele4.png" alt="" data-ww="['199px','191px','200px','150px']" data-hh="['270px','301px','259px','200px']" data-no-retina> </div>
                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
    </div>
    <!-- END REVOLUTION SLIDER -->
    <div class="slider-icons">
        <ul class="slider-social banner-social">
            <li class="animated-wrap"><a class="animated-element" href="javascript:void(0);"><i class="fab fa-facebook-f"></i> </a></li>
            <li class="animated-wrap"><a class="animated-element" href="javascript:void(0);"><i class="fab fa-twitter"></i>  </a></li>
            <li class="animated-wrap"><a class="animated-element" href="javascript:void(0);"><i class="fab fa-linkedin-in"></i> </a></li>
            <li class="animated-wrap"><a class="animated-element" href="javascript:void(0);"><i class="fab fa-instagram"></i> </a></li>
        </ul>
    </div>
</section>
<!--Banner Sec End-->


<!--Food Gallery Start-->
<section class="gallery-sec padding-top padding-bottom bg-2" id="gallery-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-6 text-center text-lg-left">
                        <div class="heading-area">
                            <span class="sub-heading">اطلاعات اولیه در مورد غذای آنلاین</span>
                            <h4 class="heading">هدف ما رضایت شماست</h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-auto">
                        <div class="mini-services">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mini-service-card">
                                        <i class="las la-brush"></i>
                                        <h4 class="number">1052+</h4>
                                        <p class="text">سفارشات آنلاین</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mini-service-card">
                                        <i class="las la-pizza-slice"></i>
                                        <h4 class="number">9800+</h4>
                                        <p class="text">مشتریان راضی</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mini-service-card">
                                        <i class="las la-mug-hot"></i>
                                        <h4 class="number">3785+</h4>
                                        <p class="text">تنوع غذایی</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row padding-top portfolio-area">
                    <?php
                        include ('db.php');
                        $stmt = $conn->prepare("SELECT * FROM `restaurant` WHERE 1 LIMIT 6");
                        $stmt->execute();

                        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                        {
                            $id = $row['id'];
                            $name = $row['name'];
                            $description = $row['description'];
                            $image = $row['image'];
                            $rate = $row['rate'];
                            $address = $row['address'];?>

                    <div class="col-12 col-md-6 col-lg-4 portfolio-item">
                        <div class="portfolio-inner-content">
                            <a href="restaurant-detail.php?id=<?php echo $id ?>">
                                <div class="item-img-holder position-relative">
                                    <img src="<?php echo $image ?>">
                                    <div class="item-badge rounded-circle"><?php echo $rate ?><span>دقیقه</span></div>
                                </div>
                                <div class="item-detail-area">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="item-name"> <?php echo $name ?></h4>
                                        <ul class="item-reviews">
                                            <li><i class="las la-star"></i></li>
                                            <li><i class="las la-star"></i></li>
                                            <li><i class="las la-star"></i></li>
                                            <li><i class="las la-star"></i></li>
                                            <li><i class="las la-star"></i></li>
                                        </ul>
                                    </div>
                                    <p class="text"><?php echo $description ?> </p>
                                </div>
                            </a>
                        </div>
                    </div>


                        <?php
                        }
                        ?>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <a href="restaurant-listing.php" class="btn main-btn rounded-pill w-100">
                            مشاهده رستوران های بیشتر
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Food Gallery End end-->

<!--Testimonial sec start-->
<section id="client" class="testimonial padding-top padding-bottom position-relative parallax">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--Testimonials with background 02-->
                <div class="feedback-slides">
                    <div class="client-thumbnails">
                        <div>
                            <div class="item">
                                <div class="img-fill"><img src="img/client2.jpg" alt="client"></div>
                                <div class="title">
                                    <h3 class="user-name">سعید</h3>
                                    <p class="user-designation">تهران</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill"><img src="img/client1.jpg" alt="client"></div>

                                <div class="title">
                                    <h3 class="user-name">حسن شاهی</h3>
                                    <p class="user-designation">رفسنجان</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill"><img src="img/client3.jpg" alt="client"></div>

                                <div class="title">
                                    <h3 class="user-name">سعید</h3>
                                    <p class="user-designation">کرمان</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="img-fill"><img src="img/client4.jpg" alt="client"></div>

                                <div class="title">
                                    <h3 class="user-name">زهرا</h3>
                                        <p class="user-designation">اصفهان</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="client-feedback">
                        <div>
                            <div class="item">
                                <div class="single-feedback">
                                    <p class="text">“خیلی فوق العاده بود”</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="single-feedback">
                                    <p class="text">“بینظیره”</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="single-feedback">
                                    <p class="text">“خیلی سریع ارسال شد ممممننون”</p>
                                </div>
                            </div>

                            <div class="item">
                                <div class="single-feedback">
                                    <p class="text">“یکی از بهترین سایت های که میشناسم”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Testimonials with background ends-->
            </div>
        </div>
    </div>
</section>
<!--Testimonial sec End-->


<!--About sec Start-->
<section class="about-sec padding-bottom padding-top bg-1" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 text-center text-lg-left">
                <div class="heading-area">
                    <h4 class="heading">ما برای راحتی شما اینجاییم</h4>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center text-center text-lg-left">
                <div class="detail-area">

                </div>
            </div>
        </div>
        <div class="row features padding-top">
            <div class="col-12 col-lg-4 text-center">
                <div class="feature-card">
                    <i class="lni lni-bulb"></i>
                    <p class="text">ما از ایده های جدید در این حوضه حمایت میکنیم</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <div class="feature-card active">
                    <i class="las la-bicycle"></i>
                    <p class="text">به ما ملحق شید</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <div class="feature-card">
                    <i class="lni lni-heart"></i>
                    <p class="text">ما دوستدار شما هستیم</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About sec End-->

<div class="foot-effect"></div>
<!--Footer Start-->
<footer class="footer-style-1 bg-2">

    <div class="container">
        <div class="row align-items-center">
            <!--Social-->
            <div class="col-12">
                <div class="footer-social text-center">
                    <ul class="list-unstyled">
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true" class="fab fa-facebook-f"></i><span></span></a></li>
                        <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true" class="fab fa-twitter"></i><span></span></a></li>
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true" class="fab fa-google-plus-g"></i><span></span></a></li>
                        <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true" class="fab fa-linkedin-in"></i><span></span></a></li>
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true" class="fab fa-instagram"></i><span></span></a></li>
                    </ul>
                </div>
            </div>
            <!--Text-->
            <div class="col-12 text-center mt-3">
                </p>
            </div>
        </div>
    </div>
</footer>
<!--Footer End-->

<!--Animated Cursor-->
<div class="aimated-cursor">
    <div class="cursor">
        <div class="cursor-loader"></div>
    </div>
</div>
<!--Animated Cursor End-->

<!--Scroll Top Start-->
<span class="scroll-top-arrow"><i class="fas fa-angle-up"></i></span>
<!--Scroll Top End-->

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
<script src="js/slick.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/notify.min.js"></script>
<script src="vendor/js/contact_us.js"></script>
<script src="js/script.js"></script>

</body>
</html>
