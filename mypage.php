<?php
  // database 이름 : mypage
  // table 이름 : accountInfo
  // phpinfo();
  //에러메세지 표시하기
  $connect = mysqli_connect("localhost", "root", "dy0316**", "mypage") or die("fail");

  // Check connection 연결 확인
  // if ($connect -> connect_errno) {
  //   echo "Failxed to connect to MySQL: " . $connect -> connect_error;
  //   exit();
  // }
  
  $select_query = "SELECT * FROM accountinfo"; //쿼리를 생성했다.
                                               //accountInfo 테이블에서 모든 column을 불러온다.

  $result = $connect -> query($select_query);
  $row = mysql_fetch_array($result);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>마이페이지</title>
    <style>
        body{
            margin-left : 20px;
            margin-right : 20px;
        }
    </style>
</head>
<body>
<br>
<h2>마이페이지</h2>

<br><br>

<table class="table table-striped">
<thead>
  <tr>
    <th>통장번호</th> <!--account_num-->
    <th>개설일자</th> <!--create_date-->
    <th>통장 만기일</th> <!--expiration_date-->
    <th>잔액</th> <!--money-->
    <th>최근거래날짜</th> <!--recent_date-->
  </tr>
</thead>
<tbody>
  <tr>
  <?php
  
  function make_table($arr){
    $html = '';
    foreach ($row as $key => $value) {
      $html .= '<tr>';
      foreach ($value as $key2 => $tableitem) {
        $html .= '<td>'.htmlspecialchars($tableitem).'</td>';
      }
      $html .= '</tr>';
    }
    return $html;
  }
  if (count($row) > 0) echo $make_table($row);

  mysqli_close($connect);

  ?>
  </tr>
</tbody>
</table> 
<button type="button" class="btn btn-default" onclick="javascript:location.reload()">다시 불러오기</button>
</body>
</html>