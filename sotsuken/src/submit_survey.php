<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $survey_id = 1; // 現在のアンケートのIDを指定（例: 1）

    // Q1. 複数選択回答（演習問題の選択）
    if (!empty($_POST['exercise'])) {
        foreach ($_POST['exercise'] as $exercise_answer) {
            $question_id = 1; // Q1のIDを指定
            $sql = "INSERT INTO responses (user_id, survey_id, question_id, answer) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiis", $user_id, $survey_id, $question_id, $exercise_answer);
            $stmt->execute();
        }
    }

    // Q2. 座席番号の回答
    if (!empty($_POST['seat_number'])) {
        $seat_number = $_POST['seat_number'];
        $question_id = 2; // Q2のIDを指定
        $sql = "INSERT INTO responses (user_id, survey_id, question_id, answer) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $user_id, $survey_id, $question_id, $seat_number);
        $stmt->execute();
    }

    // Q3. 任意記入欄の回答
    if (!empty($_POST['comments'])) {
        $comments = $_POST['comments'];
        $question_id = 3; // Q3のIDを指定
        $sql = "INSERT INTO responses (user_id, survey_id, question_id, answer) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $user_id, $survey_id, $question_id, $comments);
        $stmt->execute();
    }

    // 完了メッセージを表示し、リダイレクト
    echo "アンケートが送信されました。ご協力ありがとうございました！";
    header("Location: survey.php");
    exit();
}
?>