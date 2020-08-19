<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>questions_board</title>
</head>
<body>
    <?php
    $q_write_path = './q_write.php';
    $q_read_path = './q_read.php';

    $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
    $query = 'select title from about_questions';
    $result = mysqli_query($connect, $query);
    $list ='<ul>';

    if($result)
    {
        while ($row = mysqli_fetch_assoc($result))
            { 
            $list=$list.'<li><a href="'.$q_read_path.'/?title='.$row['title'].'">'.$row['title'].'</a></li>';
            }
        $list=$list.'</ul>';
    }
    else $list = '게시물이 하나도 없다!';

    $template = "
    <p><a href = '{$q_write_path}'>글쓰기</a></p>
    <br>
    <p>게시물</p>
    {$list}
    ";
    echo $template;
    ?>
</body>
</html>