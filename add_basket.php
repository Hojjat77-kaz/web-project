<?php 
if(!isset($_COOKIE['login'])) {
  echo "<script>window.open('login.php','_self')</script>";
    
} else {
$cookie = $_COOKIE['login'];
}
include ('db.php');
$restaurant_id = $_GET['id'];
$food_id = $_GET['id_f'];
$counter = $_GET['counter'];

if($counter == 'plus'){
    $stmt = $conn->prepare("INSERT INTO `cart` (`food_id`, `user_id`, `count`) values (:food_id, (SELECT id FROM `user` WHERE `login_code`= :cookie), 1) on duplicate key update `count` = `count`+1");
    $stmt->execute(array(':food_id' => $food_id, ':cookie' => $cookie));
}else{
    $stmt = $conn->prepare("UPDATE `cart` SET `count`= `count`-1 WHERE `user_id`=(SELECT id FROM `user` WHERE `login_code`= :cookie) AND `food_id` = :food_id");
    $stmt->execute(array(':food_id' => $food_id, ':cookie' => $cookie));
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>