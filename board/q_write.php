<!DOCTYPE>
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<body>
        <form enctype="multipart/form-data" method = "post" action = "q_action.php">
        <table>
                <tr>
                <td>제목</td>
                <td><input type = 'text' name = 'title' size=60></td>
                </tr>
                <tr>
                <td>내용</td> 
                <td><textarea name = 'contents' cols=85 rows=15></textarea></td>
                </tr></table>
                <tr>
                <td><input type="file" name="u_file"></td>
                </tr>
                <br>
                <input type = "submit" value="작성">
                </td>
                </tr>
        </form>
</body>
</html>