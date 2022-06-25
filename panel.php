<?php

if (isset($_COOKIE['login_admin'])) {
    include('db.php');
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `login_code`= :cookie");
    $stmt->execute(array(':cookie' => $_COOKIE['login_admin']));
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $user_name = $row['user_name'];
    }

} else {
    echo "<script>window.open('login_admin.php','_self')</script>";
}

$stmt_resturant = $conn->prepare("SELECT `id` , `name` FROM `restaurant` WHERE 1");
$stmt_resturant->execute();


if (isset($_POST['submit_Resturant'])) {
    $restaurantName = $_POST['restaurantName'];
    $address = $_POST['address'];
    $id = rand(1000, 10000);


    echo uploadImg($id);
    $image = 'img/' . $id . '.png';
    $stmt_insert = $conn->prepare("INSERT INTO `restaurant`(`id`, `name`, `description`, `image`, `address`) VALUES (:id,:name,:description,:image,:address)");
    $stmt_insert->execute(array(':id' => $id, ':name' => $restaurantName, ':description' => $address, ':address' => $address, ':image' => $image));

    if ($stmt_insert) {
        echo "<script>window.open('panel.php','_self')</script>";
    } else {

    }
}

if (isset($_POST['submit_food'])) {
    $restarent = $_POST['restarent'];
    $meal = $_POST['meal'];
    $food_name = $_POST['food_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = 'img/' . $id . '.png';
    $stmt_insert = $conn->prepare("INSERT INTO `food`( `restaurant_id`, `name`, `description`, `price`, `Meal`) VALUES (:restaurant_id,:name,:description,:price,:Meal)");
    $stmt_insert->execute(array(':restaurant_id' => $restarent, ':name' => $food_name, ':description' => $description, ':price' => $price, ':Meal' => $meal));

    if ($stmt_insert) {
        echo "<script>window.open('panel.php','_self')</script>";
    } else {

    }
}
function uploadImg($id)
{
    try {
        if (!empty($_FILES['image']) and is_array($_FILES['image'])) {
            //getting the image form the image fields
            $book_image_name = $_FILES['image']['name'];
            $book_image_tmp = $_FILES['image']['tmp_name'];
            $address_images = $_SERVER['DOCUMENT_ROOT'] . '/img/' . $id . ".png";
            move_uploaded_file($book_image_tmp, $address_images);
            return json_encode($address_images);
        }
    } catch (Exception $exception) {
        return $exception;
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
    <meta name="description"
          content="Food Delivery is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos.">
    <!-- keywords -->
    <meta name="keywords"
          content="Food Delivery, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq">
    <!-- Page Title -->
    <title> Food Delivery | Account</title>
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
    <link href="css/panel.css" rel="stylesheet">


    <!--Bootstrap CDN-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
                            <!--                            <img src="img/logo-white-small.png" class="logo-fixed" alt="logo">-->
                        </a>
                    </div>
                    <div class="col-lg-6 simple-navbar d-none d-lg-flex align-items-center justify-content-center">
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="navbar-nav ml-auto mr-auto">
                                    <a class="nav-link link" href="restaurant-listing.php">لیست رستوران</a>
                                    <a class="nav-link link" href="accounts.php">حساب کاربری</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-6 col-lg-3 d-flex align-items-center justify-content-end">
                        <ul class="user-links">
                            <li class="user-menu-cart"><a href="javascript:void(0);" class="fa-icon link"><i
                                            class="far fa-user"></i><span><i class="las la-angle-down ml-1"></i></span></a>
                                <div class="menu-links link">
                                    <ul>
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
                        <a href="index.php" class="navbar-brand"><img src="img/logo-white-small.png" alt="logo"></a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <nav class="side-nav w-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">خانه</a></a>
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
            <h4 class="heading">پروفایل کاربر</h4>
        </div>
    </div>
</section>
<!--Banner Sec End-->


<!--Account sec Start-->
<section class="account-sec padding-top padding-bottom bg-2">
    <div class="container">
        <div class="row border-row">
            <div class="col-12 col-lg-8 rtl">
                <div class="main-content">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="registery-restaurant" role="tabpanel"
                             aria-labelledby="account-tab">


                            <form method="post" action="" enctype="multipart/form-data" name="add_restaurant">
                                <div class="mb-3 mt-3">
                                    <label for="restaurantName" class="form-label">اسم رستوران:</label>
                                    <input type="text" class="form-control" id="restaurantName"
                                           placeholder="اسم رستوران" name="restaurantName" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">آدرس:</label>
                                    <input type="text" class="form-control" id="address" placeholder="آدرس"
                                           name="address" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">عکس رستوران:</label>
                                    <input type="file" class="form-control" id="image" placeholder="عکس"
                                           name="image" required="">
                                </div>
                                <input type="submit" name="submit_Resturant" value="ثبت رستوران"/>
                            </form>

                        </div>

                        <div class="tab-pane fade" id="food-restaurant" role="tabpanel" aria-labelledby="profile-tab">
                            <form method="post" action="" name="add_food">
                                <div class="mb-3 mt-3">
                                    <label for="resturant" class="form-label">انتخاب رستوران:</label>
                                    <select name="restarent" id="resturant">
                                        <?php
                                        while ($row = $stmt_resturant->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                    <label for="meal" class="form-label">انتخاب وعده غذایی:</label>
                                    <select name="meal" id="meal">
                                        <option value="breakfast">صبحانه</option>
                                        <option value="lunch">نهار</option>
                                        <option value="dinner">شام</option>
                                        <option value="deals">میان وعده</option>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="food_name" class="form-label">اسم غذا:</label>
                                    <input type="text" class="form-control" id="food-name" placeholder="اسم غذا"
                                           name="food_name">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">قیمت:</label>
                                    <input type="text" class="form-control" id="price" placeholder="قیمت" name="price">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">توضیحات:</label>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
                                </div>
                                <input type="submit" name="submit_food" value="ثبت غذا"/>
                            </form>


                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 rtl">
                <div class="menu-bar">
                    <div class="user-globe-details text-center">
                        <div class="img-holder rounded-pill">
                            <img src="img/test1.jpg" alt="picture" class="rounded-pill">
                        </div>
                        <h4 class="user-name"><?php echo $user_name ?></h4>
                    </div>
                    <div class="menu-tabs">
                        <ul class="nav nav-tabs flex-column nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#registery-restaurant"
                                   role="tab" aria-controls="registery-restaurant" aria-selected="true"><i
                                            class="lni lni-pointer-right mr-1"></i>ثبت رستوران</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#food-restaurant"
                                   role="tab" aria-controls="food-restaurant" aria-selected="false"><i
                                            class="lni lni-fresh-juice mr-1"></i>ثبت غذای رستوران</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" href="logout.php" role="tab"
                                   aria-controls="contact" aria-selected="false"><i class="lni lni-lock mr-1"></i>
                                    خروج</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--Account Sec End-->


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
<script src="js/script.js"></script>

</body>
</html>
