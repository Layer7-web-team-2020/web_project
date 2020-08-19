<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>로그인 양식</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        if(isset($_COOKIE["userid"]))
                $_SESSION["userid"]=$_COOKIE["userid"];
        
        
        if(!isset($_SESSION["userid"]))
        {
        ?>
        <form method="post" action="loging_result.php">
            <input type="text" name="userid" placeholder="아이디" required autofocus><br>
            <input type="password" name="pw" placeholder="비밀번호" required><br>
            <input type="checkbox" name="chbox" value="yes">로그인 상태유지<br>
            <input type="submit" value="로그인">
        </form>
        <?php
        } else {
        ?>
        <?=$_SESSION["userid"]?>님 환영합니다.<br>
        <a href="logout.php">로그아웃</a>
        <?php
        }
        ?>
    </body>
</html>
