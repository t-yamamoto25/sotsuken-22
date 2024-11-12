<?php
require_once('db_inc.php');
// 変数の初期化。新規登録か編集かにより異なる。
$act = 'insert';// 操作の種類$actを「insert(新規登録)」とする。
$uid = $uname = '' ; 
$urole = 1;
if (isset($_GET['uid'])){//既存アカウントのuidが与えられた場合
  $uid = $_GET['uid'] ; 
  $sql = "SELECT * FROM tbl_user WHERE uid='{$uid}'";  // アカウント情報を調べる
  $rs = $conn->query($sql);  // 問合せのSQL文($sql)を実行
  $row= $rs->fetch_assoc();  // 問合せ結果を一行取得
  if ($row){ // アカウントがDBに存在する場合
    $act = 'update'; //操作の種類を「update(編集)」に変更する
    $uname = $row['uname']; 
    $urole = $row['urole']; 
  }
}
?>
<h2>アカウント登録・編集</h2>
<form action="?do=save" method="post">
<input type="hidden" name="act" value="<?=$act?>">
<table>
<tr><td>ユーザID：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="uid">';//テキストボックス
}else {
  echo '<input type="hidden" name="uid" value="'.$uid.'">';//非表示送信
  echo "<b>$uid</b>";
}
?>
</td></tr>
<tr><td>氏　名：</td><td> 
  <input type="text" name="uname" value="<?=$uname?>"></td></tr>
<tr><td>パスワード</td><td>
  <input type="password" name="upass1"></td></tr>
<tr><td>（再入力）</td><td>
  <input type="password" name="upass2"></td></tr>
<tr><td>ユーザ種別</td><td>
<?php
  $codes = array(1=>'学生', 2=>'教員', 9=>'管理者');
  foreach ($codes as $key => $value){
    echo '<input type="radio" name="urole" value="' . $key . '" ';
    if ($key == $urole) echo 'checked';
    echo '>'. $value;
  }
?>  
</td></tr>
</table>
<input type="submit" value="登録"><input type="reset" value="取消">
</form>