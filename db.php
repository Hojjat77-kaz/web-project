<?php
$servername = "localhost";
$username1 = "root";
$password1 = "";
$dbname = "restaurant";
// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username1, $password1);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>