  <?php
session_start();

unset($_SESSION["userid2"]);
unset($_SESSION["pw2"]);
setcookie("userid2", "");

header("location:http://localhost/Layer7_login/login_Form2.php");
?>