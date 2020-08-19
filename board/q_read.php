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
    $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
    $query = "select * from about_questions where title='".$_GET['title']."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
        
    $template = "
    <p>제목 : {$row['title']}</p>
    <br>
    {$row['contents']}
    ";
    echo $template;
    ?>
</body>
</html>