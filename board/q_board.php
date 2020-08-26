<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>CSS</title>
    <style>
  table {
    display: table; margin-left: auto; margin-right: auto; margin-top : 100px;
    width: 90%;
    border-top: 1px solid #444444;
    border-collapse: collapse;
  }
  thead{
    border-top: 2.25px solid #444444;
    border-bottom :2.25px solid #444444;
  }
  th, td {
    border-bottom: 1px solid #444444;
    padding: 10px;
    text-align: center;
  }
</style>
  </head>
  <body>
      <br><br>
    <center><h1>문의 사항들</h1></cneter>
    <table>
      <thead>
        <tr>
          <th>번호</th><th>제목</th><th>게시일</th>
        </tr>
      </thead>
      <?php
      $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");

      $query = 'select id,title,date from about_questions';
      $result = mysqli_query($connect, $query);

      $list = '<tbody>';

      if($result)
      {
          while($row = mysqli_fetch_assoc($result))
          {
              $list = $list.'<tr><td>'.$row['id'].'</td><td><a href="./q_read.php/?id='.$row['id'].'">'.
              $row['title'].'</td><td>'.$row['date'].'</td></tr>';
          }
          $list = $list.'</tbody>';
      }

      else $list = '없다!';

      echo $list;
      mysqli_close($connect);
      ?>
    </table>
    <br>
    <p><a href = './q_write.php'>글쓰기</a></p>
    <br>
  </body>
</html>