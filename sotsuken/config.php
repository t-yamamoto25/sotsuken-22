<?php 
// MySQLサーバへ接続
$conn = new mysqli("localhost", "root", "", "sotsuken22");

// 接続エラーチェック
if ($conn->connect_errno) {
    die("データベース接続に失敗しました: " . $conn->connect_error);
}

// 文字コードをutf8に設定（文字化け対策）
$conn->set_charset('utf8');
?>