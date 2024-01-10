<?php

    session_start();

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = '';

    $conn = mysqli_connect($host, $user, $password, $db);

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $query = "select email,password,name from user where email = '$id' and password = '$pw'";
    $result = $conn -> query($query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == $pw) {   
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $row['name'];

            if (isset($_SESSION['userid'])) {
    ?> <script>
            alert("안녕하세요, <?php echo $_SESSION['username']; ?>님!");    
            location.replace("./board.php");
        </script>
            <?php
            } else {
                echo "session failed";
            }
        } else {
            ?> <script>
                alert("아이디 또는 비밀번호를 확인해주세요.");
                history.back();
            </script>
        <?php
        }
    } else {
        ?> <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back();
        </script>
    <?php
    }
    mysqli_close($conn);
    ?>