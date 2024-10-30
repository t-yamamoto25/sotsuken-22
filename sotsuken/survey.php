<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート</title>
</head>
<body>

    <h1>アンケートフォーム</h1>
    
    <form action="submit_survey.php" method="POST">
        <!-- Q1: 疑問の演習問題を選択 -->
        <label>Q1. 疑問の演習問題を選択してください。（複数回答可）</label><br>
        <input type="checkbox" name="exercise[]" value="演習1"> 演習1<br>
        <input type="checkbox" name="exercise[]" value="演習2"> 演習2<br>
        <input type="checkbox" name="exercise[]" value="演習3"> 演習3<br><br>

        <!-- Q2: 座席番号を入力 -->
        <label>Q2. 座席番号を入力してください。</label><br>
        <input type="text" name="seat_number" placeholder="例: A-12" required><br><br>

        <!-- Q3: 任意の記入欄 -->
        <label>Q3. 何かあれば記入してください。（必須ではない）</label><br>
        <textarea name="comments" placeholder="ご自由に記入してください"></textarea><br><br>

        <button type="submit">送信</button>
    </form>

</body>
</html>