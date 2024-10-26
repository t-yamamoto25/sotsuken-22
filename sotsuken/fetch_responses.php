<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sotsuken22";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

$sql = "SELECT student_name, answer, created_at FROM responses ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>名前:</strong> " . $row["student_name"] . "<br>";
        echo "<strong>回答:</strong> " . $row["answer"] . "<br>";
        echo "<small><em>" . $row["created_at"] . "</em></small></p><hr>";
    }
} else {
    echo "まだ回答はありません。";
}

$conn->close();
?>