<?php
session_start();

$userid2 = $_REQUEST["userid2"];
$pw2 = $_REQUEST["pw2"];
//$chbox= $_REQUEST["ckbox"];

    require_once("MYDB2.php");
    $pdo= db_connect();

    try{
    $sql="select passwd from member where id=?";
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(1,$userid2);
    $stmh->execute(); 
    $count=$stmh->rowCount();
} catch (PDOException $Exception) {
    print "오류 :".$Exception->getMessage();
}

$row=$stmh->fetch(PDO::FETCH_ASSOC);
    
    if($count<1) {
?>
<script>
    alert("아이디가 틀립니다!");
    history.back();
</script>

<?php }else if($pw2!=$row["passwd"]){ ?>

<script>
    alert("비밀번호가 틀립니다!");
    history.back();
</script>      

<?php } else {

    if(isset($_REQUEST["chbox"]))
{
    $a = setcookie("userid2","$userid2",time()+60*60^24);
    $b = setcookie("pw2","$pw2",time()+60*60*24);
}

    $_SESSION["userid2"]=$userid2;
    print $_SESSION["userid2"];
    header("Location:http://localhost/Layer7_login/login_Form2.php");
    exit;
    
} 
?>