<h3>配属結果確認</h3>
<?php
require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //ユーザIDを大文字に変換し学籍番号を求める

// 希望状況データを検索するSQL文
$sql = "SELECT * FROM tbl_wish WHERE sid = '{$sid}'";

//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
$row = $rs->fetch_assoc();
//問合せ結果があれば希望(pid)を求め、変数$pidに代入。空（未提出）の場合は、0を$pidに代入。
if ($row) {
    $pid = $row['pid'];
} else {
    $pid = 0;
}

$sql = "SELECT * FROM tbl_student WHERE sid = '{$sid}'";
$rs = $conn->query($sql);
$row = $rs->fetch_assoc();

// 問合せ結果を出力する。
echo '<table class="table table-hover">';
echo '<tr><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>修得単位数</th><th>本人希望</th><th>配属結果</th></tr>';
$sex_codes = array(1 => '男性', 2 => '女性'); // 性別を定義する配列
$wish_codes = array(0 => '未提出', 1 => '総合教育', 2 => '応用教育'); // 希望コースを定義する配列
$codes2 = array(0 => '未決定', 1 => '総合教育', 2 => '応用教育');
$decided = $row['decided'];
echo '<tr>';
echo '<td>' . $row['sid'] . '</td>';
echo '<td>' . $row['sname'] . '</td>';
echo '<td>' . $sex_codes[$row['sex']] . '</td>';
echo '<td>' . $row['gpa'] . '</td>';
echo '<td>' . $row['credit'] . '</td>';
echo '<td>' . $wish_codes[$pid] . '</td>';
echo '<td>' . $codes2[$decided] . '</td>';
echo '</tr>';
echo '</table>';