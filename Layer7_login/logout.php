  <?php
session_start();

unset($_SESSION["userid1"]);
unset($_SESSION["pw"]);
setcookie("userid1", "");

header("location:http://localhost/Layer7_login/login_Form.php");
?>