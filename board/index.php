<?php
require "lib/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
    <form method="post"> 
    <input type="submit" name="u_type" id="guest" value="guest" /><br/>
    <input type="submit" name="u_type" id="admin" value="admin" /><br/>
    </form>

    <?php 
    function grant_utype() {
        echo 'now you are a : '.$_POST["u_type"];
        $_SESSION["u_type"] = $_POST["u_type"];
        $_SESSION["user_id"] = 'test_u';
    } 
    if(array_key_exists('u_type',$_POST)) grant_utype();
    ?>

    <br><br>
    <a href="./q_board.php">문의사항</a>

</body>
</html>