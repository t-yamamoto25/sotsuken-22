<h3 class="bg-primary">アカウント一覧</h3>
<?php
require_once('db_inc.php');
// 一覧するデータを検索するSQL
$sql = "SELECT * FROM tbl_user ORDER BY urole, uid";
//データベースへの問合せ($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

// 問合せ結果を表形式で出力する。

echo '<table class="table table-bordered table-hover">';
// まず、ヘッド部分（項目名）を出力
echo '<tr><th>No.</th><th>氏名</th><th>ユーザ種別</th></tr>';

// ユーザID（uid）、ユーザ名(uname)、ユーザ種別(urole)を一覧表示
$row= $rs->fetch_assoc();
while ($row) {
  echo '<tr>';
  echo '<td>' . $row['uid'] . '</td>';
  echo '<td>' . $row['uname']. '</td>';
  //echo '<td>' . $row['urole']. '</td>';
  $codes = array(1=>'学生', 2=>'教員', 9=>'管理者');
 $i  = $row['urole'];     // 数字のユーザ種別をで取得
 echo '<td>' . $codes[$i] . '</td>'; // ユーザ種別名を出力
 $uid = $row['uid'];
 echo '<td><a href="?do=detail&uid='. $uid .'">詳細</a></td>';
 echo '<td><a href="?do=edit&uid='  . $uid .'">編集</a></td>';
 echo '<td><a href="?do=delete&uid='. $uid .'">削除</a></td>';
 echo '</tr>';
 $row= $rs->fetch_assoc();//次の行へ
}
?>