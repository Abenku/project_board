<?php
session_start();

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

// 글의 ID를 URL 파라미터로 받아옴
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // 해당 글의 내용을 데이터베이스에서 가져오기
    $sql = "SELECT title, content, writer, date FROM board WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $writer = $row['writer'];
        $date = $row['date'];
    } else {
        echo "해당 글을 찾을 수 없습니다.";
        exit;
    }
} else {
    echo "글 ID가 전달되지 않았습니다.";
    exit;
}

// 가져온 글의 내용을 화면에 출력
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>글 내용 보기</title>
</head>

<body>
    <h1><?php echo $title; ?></h1>
    <p>작성자: <?php echo $writer; ?></p>
    <p>작성일: <?php echo $date; ?></p>
    <div><?php echo $content; ?></div>
</body>

</html>
