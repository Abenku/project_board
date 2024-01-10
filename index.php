<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>게시판</title>
        <link rel="stylesheet" href="design/index.css">
    </head>
    <body>
        <div class = 'main_wrapper'>
            <h1><경기부터 남해까지> 게시판</h1>
            <form method="post" action="login_action.php" id = 'login_form'>
                <input type="text" name="id" placeholder="Email">
                <input type="password" name="pw" placeholder="password">
                <input type="submit" value="Login"> 
            </form>
            <a href='register.php' id = 'register_btn' type = 'button'>회원가입</a>
            <p></p>
            <a href='login.php' id = 'forgot_btn' type = 'button' >아이디/비밀번호 찾기</a>
        </div>  
    </body>
</html>