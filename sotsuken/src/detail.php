<h2>アカウント詳細</h2>
<?php
require_once('db_inc.php');
$uid  = $_GET['uid'];     // クエリ文字列で与えれれたユーザIDでユーザを特定
// 詳細を検索するSQL文
$sql = "SELECT * FROM tbl_user WHERE uid='{$uid}'";
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

// 問合せ結果を表形式で出力する
echo '<table border=1>';
$row = $rs->fetch_assoc();
if ($row) {
    echo '<tr><th>ユーザID</th><td>' . $row['uid'] . '</td></tr>';
    echo '<tr><th>ユーザ名</th><td>' . $row['uname'] . '</td></tr>';
    //echo '<tr><th>ユーザ種別</th><td>' . $row['urole']. '</td></tr>';
    $i  = $row['urole'];     // 数字のユーザ種別を取得
    $uroles = array(1 => '学生', 2 => '教員', 9 => '管理者');
    echo '<tr><th>ユーザ種別</th><td>' . $uroles[$i] . '</td></tr>';
} else {
    echo 'このユーザは存在しません！';
}
echo '</table>';
?>