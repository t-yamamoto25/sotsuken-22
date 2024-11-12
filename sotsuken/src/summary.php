<h3>希望状況集計</h3>
<?php
require_once('db_inc.php');

// 一覧データを検索するSQL文
$sql = "SELECT pid, COUNT(*) as people FROM tbl_wish GROUP BY pid UNION
SELECT pid, 0 as people FROM tbl_program WHERE pid NOT IN (SELECT pid FROM tbl_wish)
ORDER BY pid;";
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
$row = $rs->fetch_assoc();
//プログラムID(pid)、希望人数(people)の一覧表示
echo '<table class="table table-hover">';
echo '<tr><th>プログラムID</th><th>希望人数</th></tr>';
while($row){
    $pid = $row['pid'];
    $codes1 = array(1 => '総合教育', 2 => '応用教育'); //ユーザ種別を定義する配列

    echo '<tr><td>' . $codes1[$pid] . '</td><td>' . $row['people'] . '</td></tr>';
    $row = $rs->fetch_assoc();
}
echo '</table>';
?>