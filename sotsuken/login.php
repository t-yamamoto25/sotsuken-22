<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'k22rs149' && $password === 'ksu22149') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';  // 仮に学生用ページに飛ぶよう設定
        header("Location: student.html");
        exit();
    } else {
        echo "ユーザー名またはパスワードが正しくありません。";
    }
}
?>