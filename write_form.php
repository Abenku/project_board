<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>글쓰기</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-md-3">
            </div>
            <div class="col-6 col-md-6">
                <br>
                <h1>글쓰기</h1>
                <form method="POST" action="write_post.php">
                    <label for="title">제목:</label><br>
                    <input type="text" id="title" name="title"><br><br>

                    <label for="content">내용:</label><br>
                    <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
                    <input type="submit" value="작성">
                </form>

                <div class="col-6 col-md-3">

                </div>
            </div>
        </div>
</body>

</html>