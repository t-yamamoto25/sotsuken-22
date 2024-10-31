<?php
session_start();
include 'config.php'; // データベース接続ファイルをインクルード

// ログイン認証処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // データベースからユーザーを取得
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // パスワードの確認
    if ($user && password_verify($password, $user['password'])) {
        // ログイン成功: セッションにユーザー情報を保存
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];

        // ページをリダイレクト（学生と教員でリダイレクト先を分ける）
        if ($user['user_type'] === 'student') {
            header("Location: index.php?do=student_survey");
        } else if ($user['user_type'] === 'teacher') {
            header("Location: index.php?do=teacher_results");
        }
        exit();
    } else {
        // 認証失敗
        $error_message = "ユーザーIDまたはパスワードが間違っています。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>
    <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>

    <form method="POST" action="login.php">
        <label>ユーザーID: <input type="text" name="username" required></label><br>
        <label>パスワード: <input type="password" name="password" required></label><br>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>