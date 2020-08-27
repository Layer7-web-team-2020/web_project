<?php
require('lib/session.php');

if($_SESSION['u_type']!='admin'){
    echo "
    <script>
    alert('접근 권한 없음');
    location.replace('./index.php');
    </script>";
}
$connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");

$query = "delete from about_questions where id={$_SESSION['current_id']}";
$result = mysqli_query($connect, $query);

$url = './q_board.php';


if($result){
    $query ="ALTER TABLE `about_questions` AUTO_INCREMENT=1";
    $result = mysqli_query($connect, $query);
    $query = "SET @COUNT = 0";
    $result = mysqli_query($connect, $query);
    $query = "UPDATE `about_questions` SET id = @COUNT:=@COUNT+1";
    $result = mysqli_query($connect, $query);

    echo "
    <script>
    alert('게시물이 삭제되었습니다.');
    location.replace('$url');
    </script>";
}
else{
    echo 'Fail';
}
mysqli_close($connect);
?>