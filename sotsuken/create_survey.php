<?php
session_start();
include 'config.php';

if ($_SESSION['role'] !== 'teacher') {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $created_by = $_SESSION['user_id'];

    $sql = "INSERT INTO surveys (title, created_by) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $title, $created_by);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>

<!-- HTML フォーム -->
<form method="POST">
    <input type="text" name="title" placeholder="Survey Title" required>
    <button type="submit">Create Survey</button>
</form>