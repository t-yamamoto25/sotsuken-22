<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // アンケート作成処理
    $title = $_POST['title'];
    $created_by = $_SESSION['user_id'];

    // アンケートの挿入
    $stmt = $conn->prepare("INSERT INTO surveys (title, created_by) VALUES (?, ?)");
    $stmt->bind_param("si", $title, $created_by);
    $stmt->execute();
    $survey_id = $stmt->insert_id;

    // 質問の挿入
    foreach ($_POST['questions'] as $question_text) {
        $stmt = $conn->prepare("INSERT INTO survey_questions (survey_id, question_text, question_type) VALUES (?, ?, 'checkbox')");
        $stmt->bind_param("is", $survey_id, $question_text);
        $stmt->execute();
    }

    echo "アンケートが作成されました。";
}
?>

<form method="POST" action="index.php?do=teacher_create_survey">
    <label>アンケートタイトル: <input type="text" name="title" required></label><br>
    <label>質問1: <input type="text" name="questions[]" required></label><br>
    <label>質問2: <input type="text" name="questions[]"></label><br>
    <button type="submit">アンケート作成</button>
</form>