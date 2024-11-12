<h3>成績確認</h3>
<?php
require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //ユーザIDを大文字に変換し学籍番号を求める

// 一覧データを検索するSQL文
$sql = "SELECT * FROM tbl_student WHERE sid='{$sid}'";
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
// 問合せ結果を表形式で出力する。
echo '<table class="table table-hover">';
//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit)を表示
echo '<tr><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>修得単位数</th></tr>';
$row = $rs->fetch_assoc();
echo '<tr>';
echo '<td>' . $row['sid'] . '</td>';
echo '<td>' . $row['sname'] . '</td>';
//echo '<td>' . $row['sex'] . '</td>';
$i  = $row['sex'];     // ユーザ種別のコードを数値で取得
$uroles = array(1 => '男性', 2 => '女性'); //ユーザ種別を定義する配列
echo '<td>' . $uroles[$i] . '</td>'; // ユーザ種別名を配列の要素として出力
echo '<td>' . $row['gpa'] . '</td>';
echo '<td>' . $row['credit'] . '</td>';
echo '</tr>';
echo '</table>';
?>