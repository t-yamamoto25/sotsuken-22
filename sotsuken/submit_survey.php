<?php
// フォームから送信されたデータを受け取る
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Q1. 演習問題
    $exercises = isset($_POST['exercises']) ? $_POST['exercises'] : [];
    // Q2. 座席番号
    $seat_number = isset($_POST['seat_number']) ? htmlspecialchars($_POST['seat_number'], ENT_QUOTES, 'UTF-8') : '';

    // 結果を表示（後でデータベースに保存する処理に置き換え可能）
    echo "<h1>アンケート結果</h1>";
    echo "<p><strong>選択された演習問題:</strong> " . implode(', ', $exercises) . "</p>";
    echo "<p><strong>座席番号:</strong> " . $seat_number . "</p>";
}
?>