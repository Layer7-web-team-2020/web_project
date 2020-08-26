<?php
require('lib/session.php');
?>

<!DOCTYPE html>
<head>
    <title>
        <?php
        echo $_GET['title'];
        ?>
    </title>
</head>
<body>
    <?php
    $currnet_id = $_GET['id']; 
    $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
    $query = "select * from about_questions where id='".$currnet_id."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
        
    $contents = "
    <h1> Q : {$row['title']}</h1><hr>
    <br>
    {$row['contents']}
    <br><br>
    <hr>
    ";
    
    $ans_button = "
    <form method='post'> 
    <input type='submit' name='will_ans' value = '답변하기'><br/>
    </form>";

    $get_answer = "
    <form method = 'post' action = '/board/a_action.php'>
        답변하기 <br>
        <textarea name = 'answer' cols=85 rows=15></textarea> <br>
        <input type = 'submit' value='작성'>
    </form>
    ";

    if($row['answer']==NULL){
        $contents = $contents."
        <h1> 관리자는 들어라, 지금 질문에 대한 답이 없으니 빨리 와서 채워놔라</h1>
        ";
        if($_SESSION['u_type']=='admin'){
            $contents = $contents.$ans_button   ;
        }
    }
    else{
        $contents = $contents."
        <h1> A : {$row['answer']}</h1>
        ";
        if($_SESSION['u_type']=='admin'){
            $contents = $contents."
            글 수정 기능 추가 예정
            ";
        }
    }
    function get_ans() {
        $_SESSION["current_id"] = $_GET[''];
        echo $_SESSION["current_id"];
    } 
    if(array_key_exists('will_ans',$_POST)) get_ans();

    echo $contents;
    ?>
</body>
</html>