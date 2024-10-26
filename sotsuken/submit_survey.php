<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitsuken22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $exercise = $conn->real_escape_string($_POST['exercise']);
    $seat_number = $conn->real_escape_string($_POST['seat_number']);

    $sql = "INSERT INTO responses (student_name, answer, exercise, seat_number) VALUES ('$name', '', '$exercise', '$seat_number')";
    if ($conn->query($sql) === TRUE) {
        echo "アンケートが送信されました";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>