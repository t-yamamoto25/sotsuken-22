// server.js
const express = require('express');
const fs = require('fs');
const path = require('path');

const app = express();
app.use(express.json());

// アンケートデータを保存するエンドポイント
app.post('/submit-survey', (req, res) => {
    const surveyData = req.body;
    const dataPath = path.join(__dirname, 'data', 'survey_results.txt');

    // データをファイルに追記
    fs.appendFile(dataPath, JSON.stringify(surveyData) + '\n', (err) => {
        if (err) {
            console.error(err);
            res.status(500).send('サーバーエラー');
        } else {
            res.status(200).send('アンケート保存成功');
        }
    });
});

// アンケートデータを取得するエンドポイント
app.get('/get-survey-results', (req, res) => {
    const dataPath = path.join(__dirname, 'data', 'survey_results.txt');
    
    fs.readFile(dataPath, 'utf8', (err, data) => {
        if (err) {
            console.error(err);
            res.status(500).send('サーバーエラー');
        } else {
            const results = data.trim().split('\n').map(line => JSON.parse(line));
            res.json(results);
        }
    });
});

// 静的ファイルを提供
app.use(express.static(__dirname));

app.listen(3000, () => {
    console.log('サーバーがポート3000で起動しました。http://localhost:3000');
});