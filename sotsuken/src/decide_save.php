<?php
require_once('db_inc.php');
// 入力フォームからデータを受け取り、変数$decided, $sidに代入

if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];
    $decided = $_POST['decided'];
    $sql = "UPDATE tbl_student SET decided='{$decided}' WHERE sid='{$sid}';";

    // データベースへ問合せのSQL($sql)を実行 
    $rs = $conn->query($sql);
    if (!$rs) die('エラー: ' . $conn->error);

    echo $decided;
    //  希望状況一覧画面へ自動遷移（header()関数を使用）
    header("Location: ?do=list"); // URLを希望状況一覧画面のURLに置き換えてください
}