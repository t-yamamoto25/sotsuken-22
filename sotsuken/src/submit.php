<?php
require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学籍番号（ユーザIDの大文字変換）を求める

// 変数の初期化。新規登録か編集かにより異なる。
$act = 'insert'; // 新規登録の場合
$pid = 0;
$reason = '';

// 現在の希望を調べ、変数$pid、$reasonに代入
$sql = "SELECT * FROM tbl_wish WHERE sid='{$sid}'";
// データベースへ問合せのSQL($sql)を実行
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

$row = $rs->fetch_assoc();
if ($row) {
    $act = 'update';
    //続いて、問合せ結果を$pid, $reasonに代入
    $pid = $row['pid'];
    $reason = $row['reason'];
}
?>
<form action="?do=eps_save" method="post">
    <h3>情報科学科教育プログラム配属希望登録</h3><br>
    <h3>希望プログラム選択</h3>
    <input type="radio" name="pid" value="1" /checked>総合教育プログラム<br>
    <input type="radio" name="pid" value="2" />応用教育プログラム
    <h3>希望理由</h3>
    <textarea name="reason" rows="4" cols="40"></textarea><br>
    <input type="submit" name="a" value="送信" class="btn btn-primary">
    <input type="reset" value="取消" class="btn btn-danger">
    <input type="hidden" name="act" value="<?php echo $act; ?>" />
</form>