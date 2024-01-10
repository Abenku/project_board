<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 사용자로부터 입력된 데이터 가져오기
    $name = $_POST["name"];
    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $pw_check = $_POST["pw_check"];

    // 입력값 유효성 검사 (여기서는 간단하게 체크)
    if (empty($id) || empty($pw) || empty($pw_check)) {
        ?><script>
            alert("모든 필드를 입력해야 합니다.");
            history.back();
        </script><?
    } elseif ($pw != $pw_check) {
        ?><script>
            alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
            history.back();
        </script><?
    } else {
        // 데이터베이스 연결 설정
        $db_host = "localhost"; // 데이터베이스 호스트
        $db_user = "root"; // 데이터베이스 사용자 이름
        $db_password = ""; // 데이터베이스 비밀번호
        $db_name = ""; // 사용할 데이터베이스 이름

        // 데이터베이스 연결
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        
        // 연결 오류 확인
        if ($conn->connect_error) {
            die("데이터베이스 연결 실패: " . $conn->connect_error);
        }

        // SQL 쿼리를 사용하여 사용자 정보를 데이터베이스에 삽입
        $sql = "INSERT INTO user (email, password, name) VALUES ('$id', '$pw', '$name')";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                location.replace("./board.php");
            </script>
            <?
        } else {
            echo "오류: " . $sql . "<br>" . $conn->error;
        } 
        // 데이터베이스 연결 종료
        $conn->close();
    }
} else {
    echo "잘못된 요청입니다.";
}
?>
