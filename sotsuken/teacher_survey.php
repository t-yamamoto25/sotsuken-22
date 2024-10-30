<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教員ページ - アンケート結果</title>
    <style>
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

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #4a90e2;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4a90e2;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>アンケート結果一覧</h1>
        
        <table>
            <tr>
                <th>ユーザー名</th>
                <th>Q1: 演習問題の選択</th>
                <th>Q2: 座席番号</th>
                <th>Q3: コメント</th>
            </tr>
            <tr>
                <td>Aさん</td>
                <td>演習1</td>
                <td>149</td>
                <td>特にありません。</td>
            </tr>
            <tr>
                <td>Bさん</td>
                <td>演習1, 演習2</td>
                <td>23</td>
                <td>特にありません。</td>
            </tr>
        </table>
    </div>

</body>
</html>