<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    <script>
        function write_post() {
            window.location.href = './write_form.php';
        }
    </script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-3">
            </div>
            <div class="col-6 col-md-6">
                <h3>
                    <경기에서 남해까지> 게시판
                    <small class="text-body-secondary">Create by abenku</small>
                </h3>

                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="table-layout: fixed; word-break: break-all">
                        <thead>
                            <tr class="table-primary">
                                <th style='vertical-align: middle; width: 10%' class="text-center">no.</th>
                                <th style='vertical-align: middle; width: 50%' class="text-center">Title</th>
                                <th style='vertical-align: middle; width: 20%' class="text-center">Date</th>
                                <th style='vertical-align: middle; width: 20%' class="text-center">Writer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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

                            // 게시판 데이터 가져오기
                            $sql = "SELECT id, title, writer, date FROM board";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // 결과 레코드를 반복하여 표시
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td style='vertical-align: middle' class='text-primary text-center'>" . $row["id"] . "</td>";
                                    echo "<td style='vertical-align: middle' class='text-center'><a href='view_post.php?id=" . $row["id"] . "'>" . $row["title"] . "</a></td>";
                                    echo "<td style='vertical-align: middle' class='text-center'>" . $row["date"] . "</td>";
                                    echo "<td style='vertical-align: middle' class='text-center'>" . $row["writer"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>게시물이 없습니다.</td></tr>";
                                
                            }

                            // 데이터베이스 연결 종료
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <form name='frm'>
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" onclick='write_post()' >글쓰기</button>
                        </div>
                    </form>
                </div>
                <hr>
                <p class='text-muted text-center'>Copyright© 2024, Abenku, All rights reserved.</p>
            </div>
            <div class="col-6 col-md-3">

            </div>
        </div>
    </div>
</body>
</html>
