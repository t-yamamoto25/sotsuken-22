<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'student') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生用アンケートページ</title>
</head>
<body>
    <h1>アンケートに回答してください</h1>
    <form id="surveyForm">
        <label>名前: <input type="text" id="name" required></label><br><br>

        <!-- Q1. 疑問がある演習問題を選択 -->
        <p>Q1. 疑問がある演習問題を選択してください。（複数回答可）</p>
        <label><input type="radio" name="exercise" value="演習1"> 演習1</label><br>
        <label><input type="radio" name="exercise" value="演習2"> 演習2</label><br>
        <label><input type="radio" name="exercise" value="演習3"> 演習3</label><br><br>

        <!-- Q2. 座席番号を入力 -->
        <label>Q2. 座席番号を入力してください: <input type="text" id="seat_number" required></label><br><br>

        <button type="button" onclick="submitSurvey()">送信</button>
    </form>
    <script>
        function submitSurvey() {
            const name = document.getElementById('name').value;
            const exercise = document.querySelector('input[name="exercise"]:checked')?.value || '';
            const seat_number = document.getElementById('seat_number').value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'submit_survey.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('送信しました！');
                    document.getElementById('surveyForm').reset();
                }
            };
            xhr.send(`name=${name}&exercise=${exercise}&seat_number=${seat_number}`);
        }
    </script>
</body>
</html>