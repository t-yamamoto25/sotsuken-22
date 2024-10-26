<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教員用ページ</title>
</head>
<body>
    <h1>学生のアンケート結果</h1>
    <div id="responses"></div>
    <script>
        function fetchResponses() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_responses.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('responses').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        setInterval(fetchResponses, 3000); // 3秒ごとにデータ更新
    </script>
</body>
</html>