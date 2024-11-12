<h3>未提出者一覧</h3>
<?php
require_once('db_inc.php');

// 一覧データを検索するSQL
$sql = "SELECT * FROM tbl_student WHERE sid NOT IN (SELECT sid FROM tbl_wish);";
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
$row = $rs->fetch_assoc();
//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit)の一覧表示
echo '<table class="table table-hover">';
echo '<tr><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>修得単位数</th></tr>';
while($row){
    $i  = $row['sex'];     // ユーザ種別のコードを数値で取得
    $uroles = array(1 => '男性', 2 => '女性'); //ユーザ種別を定義する配列
    echo '<tr><td>' . $row['sid'] . '</td><td>' . $row['sname'] . '</td><td>' .  $uroles[$i]  . '</td><td>' . $row['gpa'] . '</td><td>' . $row['credit'] . '</td></tr>';
    $row = $rs->fetch_assoc();
}
echo '</table>';
?>