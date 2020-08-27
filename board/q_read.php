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
    $_SESSION["current_id"] = $_GET['id'];

    $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
    $query = "select * from about_questions where id='".$_SESSION["current_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    $template = "";

    $contents = "
    <h1> Q : {$row['title']}</h1><hr>
    <br>
    {$row['contents']}
    <br>
    <p>질문 한 놈 : {$row['user']}</p>  
    <hr>
    ";

    $ans_button = "
    <form method='post'> 
    <input type='submit' name='will_ans' value = '답변하기'><br/>
    </form>";

    $rev_ans = "
    <form method='post'> 
    <input type='submit' name='will_rev_ans' value = '답변수정'><br/>
    </form>";

    $get_answer = "
    <form method = 'post' action = '/board/a_action.php'>
        답변하기 <br>
        <textarea name = 'answer' cols=85 rows=15></textarea> <br>
        <input type = 'submit' value='작성'>
    </form>
    ";

    $delete_button = "
    <form method='post' action ='/board/delete_post.php'> 
    <input type='submit' name='delete_this' value = '이 게시물 삭제'><br/>
    </form>";

    $template = $template.$contents;

    if($row['answer']==NULL){
        $template = $template."
        <h1> 관리자는 들어라, 지금 질문에 대한 답이 없으니 빨리 와서 채워놔라</h1>
        ";
        if($_SESSION['u_type']=='admin'){
            $template = $template.$ans_button.$delete_button;
        }
    }

    else{
        $template = $template."
        <h1> A : {$row['answer']}</h1>
        ";
        if($_SESSION['u_type']=='admin'){
            $template = $template.$rev_ans.$delete_button;
        }
    }

    function get_ans(&$template, $contents, $get_answer) {
        $template = $contents.$get_answer;
    } 
    if(array_key_exists('will_ans',$_POST)) get_ans($template, $contents, $get_answer);

    function get_rev_ans(&$template, $contents, $get_answer) {
        $template = $contents.$get_answer;
    } 
    if(array_key_exists('will_rev_ans',$_POST)) get_rev_ans($template, $contents, $get_answer);

    echo $template;
    ?>
</body>
</html>