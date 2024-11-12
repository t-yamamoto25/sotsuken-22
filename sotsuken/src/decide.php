<?php
require_once('db_inc.php');
$sid = $_GET['sid'];

$pid = 0;
$reason = '';

// 学生の希望状況を調べ、変数に$pid, $reasonに代入
$sql = "SELECT * FROM tbl_wish WHERE sid = '{$sid}'";
// データベースへ問合せのSQL($sql)を実行
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

$row= $rs->fetch_assoc();
if ($row) {
    $pid = $row['pid'];
} else {
    $pid = 0;
}

// 学生情報を検索するSQL文
$sql = "SELECT * FROM tbl_student WHERE sid = '{$sid}'";
// データベースへ問合せのSQL($sql)を実行
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

// 問合せ結果を表形式で出力する。
//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit), 本人希望の一覧表示
?>
<table class="table table-hover">
<tr><th>学籍番号</th><th>氏名</th><th>GPA</th><th>修得単位数</th><th>本人希望</th><th>配属決定</th></tr>
<form action="?do=decide_save" method="post">
<input type="hidden" name="sid" value="<?=$sid?>">
<?php 
$row= $rs->fetch_assoc();
if ($row){ // 最大1行しかないので、while文の代わり、if文を使う
  echo '<tr>';
  echo '<td>' . $row['sid'] . '</td>';
  //続いて、残り項目の出力
  echo '<td>' . $row['sname'] . '</td>'; 
  echo '<td>' . $row['gpa'] . '</td>';
  echo '<td>' . $row['credit'] . '</td>';
  // 配属決定のラジオボタン(name="decided")
  $codes = array(
    0 => '未提出',
    1 => '総合教育', 
    2 => '応用教育', 
  );
  // foreach文で選択肢となるラジオボタンを出力する
  echo '<td>'. $codes[$pid] .'</td>';
  echo '<td><input type="radio" name="decided" value="1"/checked>総合教育<br><input type="radio" name="decided" value="2"/>応用教育</td></tr>';

}
?>
</table>
<input type="submit" value="決定"class="btn btn-danger">
<button class="btn btn-default"><a href="?do=eps_list">戻る</a></button>
</form>