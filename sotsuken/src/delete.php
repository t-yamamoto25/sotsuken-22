<?php
//---ここから--実行権限チェック---
 if (!isset($_SESSION['urole'])){
    die ('<h3>エラー：この機能はログインしないと利用できません</h3>');
 }elseif($_SESSION['urole'] != 9 ){
    die ('<h3>エラー：この機能は管理者でないと利用できません</h3>');
 }
//---ここまで--実行権限チェック---
require_once('db_inc.php');
if (isset($_GET['uid'])){//「削除」ボタンが最初に押されたとき、確認画面が表示される
  $uid = $_GET['uid'];
  echo '<h2>'. $uid . 'を本当に削除しますか?</h2>';
  echo '<form action="?do=usr_delete" method="post">';
  echo '<input type="hidden" name="confirmed_uid" value="' . $uid . '">';
  echo '<input type="submit" value="削除"> <a href="?do=usr_list"><button type="button">戻る</button></a>';
  echo '</form>';
}else if (isset($_POST['confirmed_uid'])){//「削除」ボタンが再度押されたとき、データが削除される
   $uid = $_POST['confirmed_uid'];
   $sql = "DELETE FROM tbl_user WHERE uid='{$uid}'";
   $rs = $conn->query($sql);
   header('Location:?do=lists');
}else{
  echo '<h2>削除するユーザIDは与えられていません</h2>';
  echo '<a href="?do=lists">戻る</a>';
}
?>