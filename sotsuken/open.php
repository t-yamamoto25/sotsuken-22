<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの受け取り
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // 保存するテキストファイルのパス
    $file = 'text.txt';

    // 書き込む内容を準備
    $content = "名前: " . $name . "\nメッセージ: " . $message . "\n\n";

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
