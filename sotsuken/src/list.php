<h3>希望状況一覧</h3>
<?php
require_once('db_inc.php');

// 希望状況データを検索するSQL文
$sql = "SELECT s.*, pid FROM tbl_student s LEFT JOIN tbl_wish w ON s.sid=w.sid ORDER BY sid;";

//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
$row = $rs->fetch_assoc();
// 問合せ結果を出力する。
//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit), 本人希望(pid)、配属結果(decided)、「配属決定」ボタンの一覧表示
echo '<table class="table table-hover">';
// まず、ヘッド部分（項目名）を出力
echo '<tr><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>修得単位数</th><th>本人希望</th><th>配属結果</th><th>操作</th></tr>';

while ($row) {
    $i  = $row['sex'];     // ユーザ種別のコードを数値で取得
    $uroles = array(1 => '男性', 2 => '女性'); //ユーザ種別を定義する配列
    if ($row['pid']) {
        $pid = $row['pid'];
    } else {
        $pid = 0;
    }
    $codes1 = array(0 => '未提出', 1 => '総合教育', 2 => '応用教育'); //ユーザ種別を定義する配列

    $decided = $row['decided'];
    $codes2 = array(0 => '未決定', 1 => '総合教育', 2 => '応用教育');


    echo '<tr><td>' . $row['sid'] . '</td><td>' . $row['sname'] . '</td><td>' .  $uroles[$i]  . '</td><td>' . $row['gpa'] . '</td><td>' . $row['credit'] . '</td><td>' . $codes1[$pid] . '</td><td>' . $codes2[$decided] . '</tb><td><a href="?do=eps_decide&sid=' . $row['sid'] . '" class="btn btn-default">配属決定</a></td></tr>';

    $row = $rs->fetch_assoc();
}
echo '</table>';
?>