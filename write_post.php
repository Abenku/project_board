<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 사용자가 로그인한 경우에만 글 작성을 허용
    if (isset($_SESSION['userid'])) {
        // 입력된 제목과 내용 가져오기
        $title = $_POST["title"];
        $content = $_POST["content"];
        $writer = $_SESSION['username']; // 세션에서 사용자 이름 가져오기

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

        // SQL 쿼리를 사용하여 글 정보를 데이터베이스에 삽입
        $sql = "INSERT INTO board (title, content, writer) VALUES ('$title', '$content', '$writer')";
        
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert("글이 성공적으로 작성되었습니다.");    
                location.replace("./board.php");
            </script>
        <?
        } else {
            echo "오류: " . $sql . "<br>" . $conn->error;
        }

        // 데이터베이스 연결 종료
        $conn->close();
    } else {
        echo "로그인 후 글을 작성할 수 있습니다.";
    }
} else {
    echo "잘못된 요청입니다.";
}
?>
