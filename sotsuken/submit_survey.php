<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// フォームから送信されたデータを受け取る
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Q1. 演習問題（配列の内容を文字列に変換して保存）
    $exercises = isset($_POST['exercises']) ? $_POST['exercises'] : [];
    $exercises_str = implode(", ", $exercises); // 配列をカンマで区切った文字列に変換
    
    // Q2. 座席番号
    $seat_number = isset($_POST['seat_number']) ? htmlspecialchars($_POST['seat_number'], ENT_QUOTES, 'UTF-8') : '';

    // 保存するデータを構築
    $$seat_number = "座席番号: " . $content . "\n演習問題: " . $exercises_str . "\n\n";

    // 保存するテキストファイルのパス
    $file = 'test.txt';
    
    // テキストファイルに書き込む
    if (file_put_contents($file, $content, FILE_APPEND)) {
        echo "データが正常に保存されました。";
    } else {
        echo "データの保存に失敗しました。";
    }
} else {
    echo "不正なリクエストです。";
}