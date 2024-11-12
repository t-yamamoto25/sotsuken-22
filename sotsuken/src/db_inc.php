<?php
//$conn = new mysqli("localhost", "root", "", "wp2024");//＜開発時の環境設定＞
$conn = new mysqli("localhost", "root", " ", "sotsuken22"); //＜運用時の環境設定＞
if ($conn->connect_errno) die($conn->connect_error);
$conn->set_charset('utf8'); //文字コードをutf8に設定（文字化け対策）