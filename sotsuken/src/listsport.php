<h3>アカウント一覧</h3>
<?php
require_once('db_inc.php');

//ここから、並べ替えの基準を決める
$by = isset($_GET['d']) ? -$_GET['d'] : 0;//降順 (DESC)
$by = isset($_GET['a']) ?  $_GET['a'] : $by;//昇順 (ASC)
$order = array(
  0=> 'urole, uid',
  1=> 'uid ASC',   -1=> 'uid DESC',
  2=> 'uname ASC', -2=> 'uname DESC',
  3=> 'urole ASC', -3=> 'urole DESC',
);
// 並べ替え基準をSQL文に適用
$orderby = 'ORDER BY ' . $order[$by];
$sql = "SELECT * FROM tbl_user $orderby";//$orderbyを適用

//データベースへ問合せのSQL文($sql)を実行
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
// 問合せ結果を表形式で出力する
echo '<table border=1>';
// まず、ヘッド部分（項目名）を出力
//echo '<tr><th>No.</th><th>氏名</th><th>ユーザ種別</th></tr>';

// 並べ替えボタン「▲」「▼」をリンクとして作成する（「d=?」：降順「a=?」：昇順）
$link = '<a href="?do=listsort&d=%d">▼</a><a href="?do=listsort&a=%d">▲</a>';
echo '<tr><th>No.'.sprintf($link,1,1).'</th><th>氏名'.sprintf($link,2,2).'</th><th>ユーザ種別'.sprintf($link,3,3).'</th></tr>';

$row= $rs->fetch_assoc();
while ($row) {
// ユーザID（uid）、ユーザ名(uname)、ユーザ種別(urole)を一覧表示
  echo '<tr>';
  echo '<td>' . $row['uid'] . '</td>';
  echo '<td>' . $row['uname']. '</td>';
  //echo '<td>' . $row['urole']. '</td>'; 　この行をコメントアウト、以下の3行を追加
  $i  = $row['urole'];     // ユーザ種別のコードを数値で取得
  $codes = array(1=>'学生', 2=>'教員', 9=>'管理者' ); //ユーザ種別を定義する配列
  echo '<td>' . $codes[$i] . '</td>'; // ユーザ種別名を配列の要素として出力
  echo '<td><a href="?do=detail&uid='.$row['uid'] . '">詳細</a></td>';//echo '</tr>';の直前に追加
  echo '<td><a href="?do=edit&uid='.$row['uid'].'">編集</a></td>';// echo '</tr>';の直前に追加
  echo '</tr>';
  $row = $rs->fetch_assoc();//次の行へ
}
echo '</table>';
?>