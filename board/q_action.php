<?php
                $connect = mysqli_connect("localhost", "root", "akfekfflwk", "test") or die("fail");
                $id = $_COOKIE["user_id"];
                $title = $_POST["title"];                 
                $content = $_POST["content"];             
 
                $URL = './q_board.php';       
 
 
                $query = "insert into board (id, title, contents, time) 
                        values('$id', '$title', '$content', 'now()')";
 
 
                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($connect);
?>