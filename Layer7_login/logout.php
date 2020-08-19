<?php
session_start();

unset($_SESSION["userid"]);
unset($_SESSION["pw"]);
setcookie("userid", "");

header("location:http://localhost/CH08/login_form.php");
?>

