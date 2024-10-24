<?php
$succes = file_put_contents('./test_data/test.text','2024 更新しました');
?>
<?php
if($succes){
    print('<p>ファイルへの書き込みが完了しました</p>');
}else{
    print('<p>ファイルへの書き込みが失敗しました</p>');
}
?>