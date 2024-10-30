<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アンケート結果 - 教員用ページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        .container {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4a90e2;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4a90e2;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>アンケート結果一覧</h1>
    
    <?php
    // 仮の回答データ
    $responses = [
        ['name' => 'Aさん', 'Q1' => ['演習1'], 'Q2' => '149', 'Q3' => '特にありません。'],
        ['name' => 'Bさん', 'Q1' => ['演習1', '演習2'], 'Q2' => '23', 'Q3' => '特にありません。'],
        ['name' => 'Cさん', 'Q1' => ['演習1', '演習3'], 'Q2' => '33', 'Q3' => '特にありません。'],
        ['name' => 'Dさん', 'Q1' => ['演習2', '演習3'], 'Q2' => '10', 'Q3' => 'こっそり教えてほしいです。'],
        ['name' => 'Eさん', 'Q1' => ['演習2'], 'Q2' => '53', 'Q3' => '特にありません。'],
        ['name' => 'Fさん', 'Q1' => ['演習3'], 'Q2' => '110', 'Q3' => '特にありません。']
    ];
    ?>

    <table>
        <tr>
            <th>名前</th>
            <th>Q1: 演習問題の選択</th>
            <th>Q2: 座席番号</th>
            <th>Q3: コメント</th>
        </tr>

        <?php foreach ($responses as $response): ?>
            <tr>
                <td><?php echo htmlspecialchars($response['name']); ?></td>
                <td><?php echo htmlspecialchars(implode(", ", $response['Q1'])); ?></td>
                <td><?php echo htmlspecialchars($response['Q2']); ?></td>
                <td><?php echo htmlspecialchars($response['Q3']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>