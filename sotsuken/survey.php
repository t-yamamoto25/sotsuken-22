<?php
session_start();
include 'config.php';

$survey_id = $_GET['id']; // URLパラメータからアンケートIDを取得

// フォームの送信処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    // Q1. 演習問題の選択（複数選択対応）
    if (!empty($_POST['exercise'])) {
        $exercise_answers = $_POST['exercise'];
        foreach ($exercise_answers as $answer) {
            $question_id = 1; // Q1のIDを指定（仮に1とする）
            $sql = "INSERT INTO responses (survey_id, user_id, question_id, answer) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiis", $survey_id, $user_id, $question_id, $answer);
            $stmt->execute();
        }
    }

    // Q2. 座席番号
    if (!empty($_POST['seat_number'])) {
        $seat_number = $_POST['seat_number'];
        $question_id = 2; // Q2のIDを指定（仮に2とする）
        $sql = "INSERT INTO responses (survey_id, user_id, question_id, answer) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $survey_id, $user_id, $question_id, $seat_number);
        $stmt->execute();
    }

    // Q3. 任意記入欄
    if (!empty($_POST['comments'])) {
        $comments = $_POST['comments'];
        $question_id = 3; // Q3のIDを指定（仮に3とする）
        $sql = "INSERT INTO responses (survey_id, user_id, question_id, answer) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiis", $survey_id, $user_id, $question_id, $comments);
        $stmt->execute();
    }

    echo "アンケートの回答が送信されました。";
}
?>

<!-- HTML アンケートフォーム -->
<form method="POST">
    <!-- Q1. 疑問の演習問題を選択してください（複数回答可能） -->
    <label>Q1. 疑問の演習問題を選択してください。（複数回答可）</label><br>
    <input type="checkbox" name="exercise[]" value="演習1"> 演習1<br>
    <input type="checkbox" name="exercise[]" value="演習2"> 演習2<br>
    <input type="checkbox" name="exercise[]" value="演習3"> 演習3<br><br>

    <!-- Q2. 座席番号の入力 -->
    <label>Q2. 座席番号を入力してください。</label><br>
    <input type="text" name="seat_number" placeholder="例: A-12" required><br><br>

    <!-- Q3. 任意の記入欄 -->
    <label>Q3. 何かあれば記入してください。（必須ではない）</label><br>
    <textarea name="comments" placeholder="ご自由に記入してください"></textarea><br><br>

    <button type="submit">アンケートを送信</button>
</form>