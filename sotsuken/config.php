<?php
// データベース接続設定
$servername = "localhost";
$username = "root"; // データベースのユーザー名
$password = " "; // データベースのパスワード
$dbname = "sotsuken22"; // データベース名

// データベースへの接続を確立
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェック
if ($conn->connect_error) {
    die("データベース接続に失敗しました: " . $conn->connect_error);
}

// 文字コード設定
$conn->set_charset("utf8");
?>