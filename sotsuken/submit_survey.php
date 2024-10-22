<?php
// フォームから送信されたデータを受け取る
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Q1. 演習問題
    $exercises = isset($_POST['exercises']) ? $_POST['exercises'] : [];
    // Q2. 座席番号
    $seat_number = isset($_POST['seat_number']) ? htmlspecialchars($_POST['seat_number'], ENT_QUOTES, 'UTF-8') : '';

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
?>