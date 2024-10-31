<?php
session_start();
include 'config.php';

if ($_SESSION['role'] !== 'teacher') {
    header("Location: dashboard.php");
    exit();
}

$survey_id = $_GET['id'];

$sql = "SELECT answer FROM responses WHERE survey_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $survey_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<p>" . htmlspecialchars($row['answer']) . "</p>";
}
?>