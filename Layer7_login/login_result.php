<?php
session_start();

$userid1 = $_REQUEST["userid1"];
$pw = $_REQUEST["pw"];
//$chbox= $_REQUEST["ckbox"];

    require_once("MYDB.php");
    $pdo= db_connect();

    try{
    $sql="select passwd from member where id=?";
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(1,$userid1);
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

<?php }else if($pw!=$row["passwd"]){ ?>

<script>
    alert("비밀번호가 틀립니다!");
    history.back();
</script>      

<?php } else {

    if(isset($_REQUEST["chbox"]))
{
    $a = setcookie("userid1","$userid1",time()+60*60^24);
    $b = setcookie("pw","$pw",time()+60*60*24);
}

    $_SESSION["userid1"]=$userid1;
    print $_SESSION["userid1"];
    header("Location:http://localhost/Layer7_login/login_Form.php");
    exit;
    
} 
?>