<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
} else {
    echo "データベースに正常に接続しました！";
}