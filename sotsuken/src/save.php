<?php
require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学籍番号（ユーザIDの大文字変換）を求める

if (isset($_POST['act'])) {
    // 入力フォームからデータを受け取り、変数$act, $pid,$reasonに代入
    $act = $_POST['act'];
    //続いて、問合せ結果を$pid, $reasonに代入
    $pid = $_POST['pid'];
    $reason = $_POST['reason'];

    if ($act == 'update') { // 新規・編集($act)による場合分けでSQL文を作成
        $sql = "UPDATE tbl_wish SET pid='{$pid}',reason='{$reason}',updated_at=now()WHERE sid='{$sid}'";
    } else {
        $sql = "INSERT INTO tbl_wish VALUES('{$sid}','{$pid}','{$reason}',now())";
    }
    // データベースへ問合せのSQL($sql)を実行
    $rs = $conn->query($sql);
    if (!$rs) die('エラー: ' . $conn->error);

    // 「登録完了」メッセージを表示
    echo '登録完了';
}
?>