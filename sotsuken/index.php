<?php
session_start();
include('src/header.php'); // ヘッダーの共通表示

// デフォルトでホームページを表示
$action = 'home';

// クエリ文字列で指定されたページに基づく処理
if (isset($_GET['do'])) {
    $action = $_GET['do'];
}

// 指定されたファイルを読み込む
if (file_exists('src/' . $action . '.php')) {
    include('src/' . $action . '.php');
} else {
    echo "ページが見つかりません。";
}

include('src/footer.php'); // フッターの共通表示
?>