<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ユーザー名を使ってユーザーを取得
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // ログイン成功、セッションにユーザー情報を保存
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: survey.php"); // アンケートページへリダイレクト
        exit();
    } else {
        echo "ユーザー名またはパスワードが違います。";
    }
}
?>

<!-- HTML ログインフォーム -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h2>ログイン</h2>
    <form method="POST">
        <label>ユーザー名:</label>
        <input type="text" name="username" required><br><br>
        
        <label>パスワード:</label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">ログイン</button>
    </form>
</body>
</html>