<?php
$id=$_REQUEST["id"];

require_once("MYDB2.php");
$pdo = db_connect();

try {
    $pdo->beginTransaction();
    $sql="delete from member where id=?";
    $stmh=$pdo->prepare($sql);
    $stmh->bindValue(1, $id,PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    header("Location:http://localhost/Layer7_login/list2.php"); 
} catch (PDOException $Exception) {
    $pdo->rollBack();
    print "오류 :".$Exception->getMessage();
}
?>