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
        if(isset($_COOKIE["userid1"]))
                $_SESSION["userid1"]=$_COOKIE["userid1"];
        
        
        if(!isset($_SESSION["userid1"]))
        {
        ?>
        <form method="post" action="login_result.php">
            <input type="text" name="userid1" placeholder="아이디"><br>
            <input type="password" name="pw" placeholder="비밀번호"><br>
            <input type="checkbox" name="chbox" value="yes">로그인 상태유지<br>
            <input type="submit" value="로그인">
        </form>
        <?php
        } else {
        ?>
        <?=$_SESSION["userid1"]?>님 환영합니다.<br>
        <a href="logout.php">로그아웃</a>
        <a href="list.php">관리자 리스트 보기</a>
        <a href="list2.php">게스트 리스트 보기</a>
        <?php
        }
        ?>
        

    </body>
</html>