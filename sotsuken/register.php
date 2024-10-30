<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // パスワードをハッシュ化

    // ユーザー名が既に登録されていないか確認
    $check_sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "そのユーザー名は既に使用されています。";
    } else {
        // 新規ユーザー登録
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            echo "登録が完了しました。";
            header("Location: login.php"); // 登録後、ログインページへリダイレクト
            exit();
        } else {
            echo "エラーが発生しました。";
        }
    }
}
?>

<!-- HTML 登録フォーム -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
</head>
<body>
    <h2>ユーザー登録</h2>
    <form method="POST">
        <label>ユーザー名:</label>
        <input type="text" name="username" required><br><br>
        
        <label>パスワード:</label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">登録</button>
    </form>
</body>
</html>