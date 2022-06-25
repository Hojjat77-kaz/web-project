<?php
setcookie("login", "", time() - 3600);
setcookie("login_admin", "", time() - 3600);

echo "<script>window.open('login.php','_self')</script>";