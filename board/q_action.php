<?php
require('lib/session.php');
?>

<?php
$connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
$user_id = $_SESSION["user_id"];
$title = $_POST["title"];                 
$content = $_POST["contents"];
$URL = './q_board.php';
$file_name = $_FILES['u_file']['name'];

$query = "insert into about_questions (user, title, contents, date,file) 
        values('$user_id', '$title', '$content', now(), '$file_name')";

        $result = mysqli_query($connect, $query);

$upload_dir = $_SERVER['DOCUMENT_ROOT']."/tmp/";
$upload_file = $upload_dir.basename($_FILES['u_file']['name']);

if(move_uploaded_file($_FILES['u_file']['tmp_name'], $upload_file)){
        echo "
        <script>
        alert('$upload_file 저장완료');
        </script>";
}

if($result){
        echo "
        <script>
        alert('글이 등록되었습니다.');
        location.replace('$URL');
        </script>
        ";
}
        else{
        echo "
        <script>
        alert('fail');
        location.replace('$URL');
        </script>
        ";
}
mysqli_close($connect);
?>