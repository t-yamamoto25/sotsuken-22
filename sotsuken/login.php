<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sotsuken22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'student') {
            header("Location: student.html");
        } else if ($user['role'] === 'teacher') {
            header("Location: teacher.html");
        }
        exit();
    } else {
        echo "IDまたはパスワードが間違っています";
    }
}

$conn->close();
?>