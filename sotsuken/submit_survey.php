<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sotsuken22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

$name = $_POST['name'];
$exercise = $_POST['exercise'];
$seat_number = $_POST['seat_number'];

$sql = "INSERT INTO responses (student_name, exercise, seat_number) VALUES ('$name', '$exercise', '$seat_number')";

if ($conn->query($sql) === TRUE) {
    echo "アンケートを送信しました";
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>