<?php
session_start();

// 仮のユーザー名とパスワード
$valid_username = 'k22rs149';
$valid_password = 'ksu22149';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ユーザー名とパスワードのチェック
    if ($username === $valid_username && $password === $valid_password) {
        // ログイン成功
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // ダッシュボードページへリダイレクト
        header('Location: student_dashboard.html');
        exit();
    } else {
        // ログイン失敗
        header('Location: login.php?error=1');
        exit();
    }
}
?>