<?php

include('db.php');
if (isset($_COOKIE['login'])) {
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
    <meta name="description"
          content="Food Delivery is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords"
          content="Food Delivery, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq">
    <!-- Page Title -->
    <title> Food Delivery | Restaurant Detail</title>
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
    <link href="vendor/css/swiper.min.css" rel="stylesheet">

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

<!--Header Start-->
<header id="home" class="cursor-light">

    <div class="inner-header nav-icon">
        <div class="main-navigation">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <a class="navbar-brand link" href="index.html">
                            <img src="img/logo.png" class="" alt="logo">
                            <!--                            <img src="img/logo-white-small.png" class="logo-fixed" alt="logo">-->
                        </a>
                    </div>
                    <div class="col-lg-6 simple-navbar d-none d-lg-flex align-items-center justify-content-center">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav ml-auto mr-auto">
                                    <a class="nav-link link" href="index.php">خانه</a></a>
                                    <a class="nav-link link" href="restaurant-listing.php">لیست رستوران</a>>
                                    <a class="nav-link link" href="accounts.php">حساب کاربری</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center justify-content-end">
                        <ul class="user-links">
                            <li class="header-shop-cart"><a href="javascript:void(0);"
                                                            class="line-icon position-relative link"><i
                                            class="las la-shopping-bag"></i><span
                                            class="badge rounded-circle"><?php if (isset($_COOKIE['login'])) echo $count ?></span></a>
                                <div class="minicart link">
                                    <div class="minicart-content">
                                        <?php

                                        include('db.php');
                                        if (isset($_COOKIE['login'])) {
                                            $cookie = $_COOKIE['login'];
                                            $stmt = $conn->prepare("SELECT food.id ,`food`.`name` , food.`price` , `cart`.`count` ,`user_id`,`restaurant`.`image`,food.restaurant_id FROM `cart` INNER JOIN food ON `cart`.`food_id` = `food`.id INNER JOIN restaurant on food.restaurant_id = restaurant.id WHERE `user_id`= (SELECT id FROM `user` WHERE `login_code`= :cookie)");
                                            $stmt->execute(array(':cookie' => $cookie));
                                            $amount = 0;
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $price = $row['price'];
                                                $count = $row['count'];
                                                $user_id = $row['user_id'];
                                                $image = $row['image'];
                                                $restaurant_id = $row['restaurant_id'];
                                                $amount += $row['price'];
                                                if ($count <= 0)
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
                                                            <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter="
                                                               target="_self">-</a>
                                                            <input type="text" value="<?php echo $count ?>"/>
                                                            <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } ?>
                                    </div>
                                    <ul class="ml-0">
                                        <li>
                                            <div class="total-price">
                                                <!--                                                <span class="f-left">Total:</span>-->
                                                <span class="f-right">تومان<?php if (isset($_COOKIE['login'])) echo $amount ?></span>
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
                            <li class="user-menu-cart"><a href="javascript:void(0);" class="fa-icon link"><i
                                            class="far fa-user"></i><span><i class="las la-angle-down ml-1"></i></span></a>
                                <div class="menu-links link">
                                    <ul>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="login.php"><i class="lni lni-key"></i>ورود</a></li>
                                        <li>
                                            <div class="overlay-link"></div>
                                            <a href="registeration.php"><i
                                                        class="lni lni-pointer-right"></i>ثبت نام</a></li>
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
                        <a href="index.html" class="navbar-brand"><img src="img/logo-white-small.png" alt="logo"></a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <nav class="side-nav w-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">خانه</a>a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="restaurant-listing.php">لیست رستوران</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="accounts.php">حساب کاربری</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-12 col-lg-4 d-flex align-items-center">
                        <div class="side-footer text-white w-100">
                            <div class="menu-company-details">
                                <span>09130000000</span>
                                <span>gmail@gmail.com</span>
                            </div>
                            <ul class="social-icons-simple">
                                <li><a class="facebook-text-hvr" href="javascript:void(0)"><i
                                                class="fab fa-facebook-f"></i> </a></li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i
                                                class="fab fa-twitter"></i> </a></li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i
                                                class="fab fa-youtube"></i> </a></li>
                                <li><a class="instagram-text-hvr" href="javascript:void(0)"><i
                                                class="fab fa-instagram"></i> </a></li>
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
<section class="secondary-pages-banner cursor-light bg-1" id="main-banner">
    <!-- END REVOLUTION SLIDER -->
    <img src="img/slider-ele3.png" class="secondary-item1">
    <img src="img/slider-ele1.png" class="secondary-item2">
    <div class="banner-content text-center">
        <div class="heading-area">
            <h4 class="heading">Restaurant Detail</h4>
            <div class="crumbs">
                <nav aria-label="breadcrumb" class="breadcrumb-items">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="link">خانه</a></li>
                        <li class="breadcrumb-item"><a href="restaurant-detail.php" class="link">رستوران</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!--Banner Sec End-->

<!--Detail page-->
<section class="detail-page-sec padding-top padding-bottom bg-2" id="detail-page-sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="row nav nav-pills" id="pills-tab" role="tablist">
                    <li class="col-6 col-lg-3 nav-item pr-1">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                           aria-controls="pills-home" aria-selected="true">
                            <i class="lni lni-fresh-juice pill-icon"></i>
                            <span class="pill-name">صبحانه</span>
                        </a>
                    </li>
                    <li class="col-6 col-lg-3 nav-item pl-1">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                           aria-controls="pills-profile" aria-selected="false">
                            <i class="lni lni-chef-hat pill-icon"></i>
                            <span class="pill-name">نهار</span>
                        </a>
                    </li>
                    <li class="col-6 col-lg-3 nav-item pr-1">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                           aria-controls="pills-contact" aria-selected="false">
                            <i class="lni lni-dinner pill-icon"></i>
                            <span class="pill-name">شام</span>
                        </a>
                    </li>
                    <li class="col-6 col-lg-3 nav-item pl-1">
                        <a class="nav-link" id="pills-deal-tab" data-toggle="pill" href="#pills-deal" role="tab"
                           aria-controls="pills-contact" aria-selected="false">
                            <i class="lni lni-gift pill-icon"></i>
                            <span class="pill-name">میان وعده</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <from action="" method="post" name="">
                                    <?php
                                    include('db.php');
                                    $restaurant_id = $_GET['id'];

                                    $stmt = $conn->prepare("SELECT count(*) as c FROM `food` WHERE `restaurant_id` = :id and `Meal`='breakfast'");
                                    $stmt->execute(array(':id' => $restaurant_id));
                                    $row_count = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $count = ceil($row_count['c'] / 2);

                                    $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='breakfast' limit :c");
                                    $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                    $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                    $stmt->execute();
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $description = $row['description'];
                                        $Meal = $row['Meal'];
                                        $rate = $row['price']; ?>
                                        <div class="food-list ml-0">
                                            <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus&counter=plus">
                                                <div class="list-overlay"></div>
                                                <div class="rates d-flex justify-content-between">

                                                    <div class="info">
                                                        <h6 class="main-heading"><?php echo $name ?></h6>
                                                        <p class="text"><?php echo $description ?></p>
                                                    </div>
                                                    <p class="rate">تومان<?php echo $rate ?></p>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                            </div>
                            </form>
                            <div class="col-12 col-md-6">
                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='breakfast' limit :c offset :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>

                                    <div class="food-list">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-12 col-md-6">

                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT count(*) as c FROM `food` WHERE `restaurant_id` = :id and `Meal`='lunch'");
                                $stmt->execute(array(':id' => $restaurant_id));
                                $row_count = $stmt->fetch(PDO::FETCH_ASSOC);
                                $count = ceil($row_count['c'] / 2);

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='lunch' limit :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>
                                    <div class="food-list ml-0">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='lunch' limit :c offset :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>

                                    <div class="food-list">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT count(*) as c FROM `food` WHERE `restaurant_id` = :id and `Meal`='dinner'");
                                $stmt->execute(array(':id' => $restaurant_id));
                                $row_count = $stmt->fetch(PDO::FETCH_ASSOC);
                                $count = ceil($row_count['c'] / 2);

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='dinner' limit :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>
                                    <div class="food-list ml-0">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-12 col-md-6">

                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id and `Meal`='dinner' limit :c offset :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>

                                    <div class="food-list">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-deal" role="tabpanel" aria-labelledby="pills-deal-tab">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT count(*) as c FROM `food` WHERE `restaurant_id` = :id and `Meal`='deals'");
                                $stmt->execute(array(':id' => $restaurant_id));
                                $row_count = $stmt->fetch(PDO::FETCH_ASSOC);
                                $count = ceil($row_count['c'] / 2);

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id  and `Meal`='deals'limit :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>

                                    <div class="food-list ml-0">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-12 col-md-6">
                                <?php
                                include('db.php');
                                $restaurant_id = $_GET['id'];

                                $stmt = $conn->prepare("SELECT * FROM `food` WHERE `restaurant_id` = :id  and `Meal`='deals' limit :c offset :c");
                                $stmt->bindValue(':c', (int)$count, PDO::PARAM_INT);
                                $stmt->bindValue(':id', (string)$restaurant_id, PDO::PARAM_STR);
                                $stmt->execute();
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $description = $row['description'];
                                    $Meal = $row['Meal'];
                                    $rate = $row['price']; ?>

                                    <div class="food-list">
                                        <a href="add_basket.php?id=<?php echo $restaurant_id ?>&id_f=<?php echo $id ?>&counter=plus">
                                            <div class="list-overlay"></div>
                                            <div class="rates d-flex justify-content-between">
                                                <div class="info">
                                                    <h6 class="main-heading"><?php echo $name ?></h6>
                                                    <p class="text"><?php echo $description ?></p>
                                                </div>
                                                <p class="rate">تومان<?php echo $rate ?></p>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--Detail ;page End-->

<div class="foot-effect"></div>
<!--Footer Start-->
<footer class="footer-style-1 bg-1">

    <div class="container">
        <div class="row align-items-center">
            <!--Social-->
            <div class="col-12">
                <div class="footer-social text-center">
                    <ul class="list-unstyled">
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                                                                  class="fab fa-facebook-f"></i><span></span></a>
                        </li>
                        <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true"
                                                                                    class="fab fa-twitter"></i><span></span></a>
                        </li>
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                                                                  class="fab fa-google-plus-g"></i><span></span></a>
                        </li>
                        <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true"
                                                                                    class="fab fa-linkedin-in"></i><span></span></a>
                        </li>
                        <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                                                                  class="fab fa-instagram"></i><span></span></a>
                        </li>
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
<script src="js/nouislider.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/notify.min.js"></script>
<script src="vendor/js/contact_us.js"></script>
<script src="vendor/js/swiper.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
