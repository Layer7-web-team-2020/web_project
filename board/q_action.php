<?php
require('lib/session.php');
?>

<?php
$connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
$user_id = $_SESSION["user_id"];
$title = $_POST["title"];                 
$content = $_POST["contents"];
$URL = './q_board.php';       
 
 
$query = "insert into about_questions (user, title, contents, time) 
        values('$user_id', '$title', '$content', now())";

$result = mysqli_query($connect, $query);

if($result){
?>      <script>
        alert("<?php echo "글이 등록되었습니다."?>");
        location.replace("<?php echo $URL?>");
        </script>
<?php
        }
else echo $query;
 
mysqli_close($connect);
?>