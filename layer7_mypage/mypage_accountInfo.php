<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>내 통장 정보</title>
    <style>
        body{
            margin-left : 20px;
            margin-right : 20px;
        }
    </style>
</head>
<body>
<br>
<h2>내 통장 정보</h2>

<br><br>
<?php
  //database 이름 : mypage
  //table 이름 : accountInfo
  $mysqli = mysqli_connect("127.0.0.1","root","password","mypage");

  // Check connection 연결 확인
  if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

  $sql = "SELECT * FROM accountInfo"; //쿼리를 생성했다.
                                      //accountInfo 테이블에서 모든 column을 불러온다.
  $result = mysqli_query($mysqli,$sql);
  echo $result;

  //mysqli_query를 이용해서 출력해야한다는데...

?>

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
    <td><?php ?></td>
    <td><?php ?></td>
    <td><?php ?></td>
    <td><?php ?></td>
    <td><?php ?></td>
  </tr>
</tbody>

</table> 
<button type="button" class="btn btn-default" onclick="javascript:location.reload()">다시 불러오기</button>
</body>
</html>