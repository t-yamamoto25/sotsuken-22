<?php
session_start();

// ログインしているか確認
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // ログインしていなければログインページにリダイレクト
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>生徒用ページ - アンケートフォーム</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .student-dashboard-container {
            width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .student-dashboard-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin: 10px 0;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .question {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="student-dashboard-container">
    <h1>生徒用ページ - アンケート</h1>
    <p>以下の質問に回答してください。</p>

    <form action="submit_survey.php" method="post">
        <!-- Q1. わからない演習問題を選択してください -->
        <div class="question">
            <label>Q1. わからない演習問題を選択してください。（複数選択可）</label>
            <input type="checkbox" name="exercises[]" value="演習１"> 演習１<br>
            <input type="checkbox" name="exercises[]" value="演習２"> 演習２<br>
            <input type="checkbox" name="exercises[]" value="演習３"> 演習３<br>
        </div>

        <!-- Q2. 座席番号を入力してください -->
        <div class="question">
            <label for="seat_number">Q2. 座席番号を入力してください：</label>
            <input type="text" id="seat_number" name="seat_number" placeholder="座席番号を入力してください" required>
        </div>

        <!-- 送信ボタン -->
        <input type="submit" value="送信">
    </form>
</div>

</body>
</html>