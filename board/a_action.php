<?php
require('lib/session.php');
?>

<?php
$connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
$answer = $_POST["answer"];
$URL = './q_board.php'; 
 
 
$query = "update about_questions
        set answer = '$answer'
        where id = {$_SESSION['current_id']}";
 
$result = mysqli_query($connect, $query);

if($result){
?>      <script>
        alert("<?php echo "글이 등록되었습니다."?>");
        location.replace("<?php echo $URL?>");
        </script>
<?php
        }
else echo $query;

echo $_SESSION['current_id'];
mysqli_close($connect);
?>