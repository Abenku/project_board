<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>php server</title>
        <link rel="stylesheet" href="design/login.css">
    </head>

    <body>
        <div class='board_header'>
            
        </div>
        <div class="login_wrapper">
            <h2>정보보호 4회차</h2>
            <h2><경기부터 남해까지></h2>
            <h2>게시판</h2>
            <h2>Login</h2>
            <form method="post" action="login_action.php" id = 'login_form'>
                <input type="text" name="id" placeholder="Email">
                <input type="password" name="pw" placeholder="password">
                <input type="submit" value="Login"> 
            </form>
            <a href = 'register.php'>회원가입</a> | <a href = ''>아이디/비밀번호 찾기</a>
        </div>
    </body>
</html>