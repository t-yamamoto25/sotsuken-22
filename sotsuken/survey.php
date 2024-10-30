<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // 未ログインならlogin.phpにリダイレクト
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アンケートフォーム</title>
    <!-- ここにCSSやフォームのコード -->
</head>
<body>
    <h1>アンケートページ</h1>
    <!-- アンケートフォームの内容を表示 -->
</body>
</html>