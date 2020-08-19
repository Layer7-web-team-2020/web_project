<?php
session_start();

unset($_SESSION["userid"]);
unset($_SESSION["pw"]);
setcookie("userid", "");

header("location:http://localhost/Layer7_login/login_form.php");
?>

