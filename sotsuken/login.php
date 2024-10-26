<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sotsuken22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("接続に失敗しました: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === 'student') {
            header("Location: student.php");
        } else if ($row['role'] === 'teacher') {
            header("Location: teacher.php");
        }
        exit();
    } else {
        echo "ユーザー名またはパスワードが正しくありません。";
    }
}

$conn->close();
?>