<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>php server</title>
        <link rel="stylesheet" href="design/register.css">
    </head>
    <script>
    function id_check(){
        var uid = document.getElementById('id').value;
        if (uid) {
            url = 'check.php?uid='+uid;
            window.open(url, 'chkid', 'width=400, height=200');
        }
        else {
            alert('아이디를 입력하세요');
        }
    }
    </script>
    <body>
        <div class='register_wrapper'>
            <form method="post" action="register_action.php" id = 'register_form'>
                <input type="text" name="name" placeholder="Name" id = 'name'>
                <input type="text" name="id" placeholder="Email" id = 'id'>
                <!-- <input type="button" value="ID 중복확인" id='id_check' onclick='id_check();'>  -->
                <input type="password" name="pw" placeholder="password">
                <input type="password" name="pw_check" placeholder="password check">
                <input type="submit" value="회원가입"> 
            </form>
        </div>
    </body>
</html>
