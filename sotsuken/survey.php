<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
    <style>
        /* ページ全体のスタイル */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* フォームコンテナ */
        .survey-container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        /* タイトル */
        .survey-container h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #4a90e2;
        }

        /* 質問ラベル */
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        /* 入力フィールド */
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* チェックボックス */
        input[type="checkbox"] {
            margin-right: 8px;
        }

        /* テキストエリアを広く */
        textarea {
            height: 80px; /* 広めの高さ */
        }

        /* 送信ボタン */
        button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover {
            background-color: #357abd;
        }
    </style>
</head>
<body>

    <div class="survey-container">
        <h1>アンケートフォーム</h1>
        
        <form action="submit_survey.php" method="POST">
            <!-- Q1: 疑問の演習問題を選択 -->
            <label>Q1. 疑問の演習問題を選択してください。（複数回答可）</label>
            <input type="checkbox" name="exercise[]" value="演習1"> 演習1<br>
            <input type="checkbox" name="exercise[]" value="演習2"> 演習2<br>
            <input type="checkbox" name="exercise[]" value="演習3"> 演習3<br><br>

            <!-- Q2: 座席番号を入力 -->
            <label>Q2. 座席番号を入力してください。</label>
            <input type="text" name="seat_number" placeholder="例: A-12" required><br>

            <!-- Q3: 任意の記入欄 -->
            <label>Q3. 何かあれば記入してください。（必須ではない）</label>
            <textarea name="comments" placeholder="ご自由に記入してください"></textarea><br>

            <button type="submit">送信</button>
        </form>
    </div>

</body>
</html>