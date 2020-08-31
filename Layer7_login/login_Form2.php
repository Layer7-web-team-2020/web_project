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
        if(isset($_COOKIE["userid2"]))
                $_SESSION["userid2"]=$_COOKIE["userid2"];
        
        
        if(!isset($_SESSION["userid2"]))
        {
        ?>
        <form method="post" action="login_result2.php">
            <input type="text" name="userid2" placeholder="아이디"><br>
            <input type="password" name="pw2" placeholder="비밀번호"><br>
            <input type="checkbox" name="chbox" value="yes">로그인 상태유지<br>
            <input type="submit" value="로그인">
        </form>
        <?php
        } else {
        ?>
        <?=$_SESSION["userid2"]?>님 환영합니다.<br>
        <a href="logout2.php">로그아웃</a>
        <?php
        }
        ?>
        

    </body>
</html>