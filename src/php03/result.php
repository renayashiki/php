<?php

require_once('config/status_codes.php');
// 全てのステータスコードの情報が配列として保存されている。

$answer_code = htmlspecialchars($_POST['answer_code'], ENT_QUOTES);
// answer_code には正解のコード（例: 200）が
$option = htmlspecialchars($_POST['option'], ENT_QUOTES);
// $POSTはフォームから送信されたデータを受け取るための変数
// optionにはユーザーが選んだコードが入っています


  if (!$option) {
  header('Location: index.php');
}
// もしユーザーが何も選択せずに直接このページにアクセスしたら(optionが空の場合)…index.php(クイズのトップページ)に教師絵的に移動させる


foreach ($status_codes as $status_code) {
  // $status_codesという配列(ステータスコードのリスト)をループ処理する
  if ($status_code['code'] === $answer_code) {
    // ループしている配列の$status_codesの"code"キーの値とユーザーの答えが一致するかどうかを判定する
    $code = $status_code['code'];
    // 一致した場合、そのステータスコードを$code変数に格納する
    $description = $status_code['description'];
    // 一致した場合、そのステータスコードの説明を$description変数に格納する
  }
}

$result = $option === $code;
// ユーザーの解答と正解のステータスコード$codeが一致するかどうかを判定し、$result変数に真偽値を格納する

              ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/result.css">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        Status Code Quiz
      </a>
    </div>
  </header>

  <main>
    <div class="result__content">
      <div class="result">
        <?php if ($result): ?>
          <h2 class="result__text--correct">正解</h2>
        <?php else: ?>
          <!-- phpで定義された$result変数が正解かどうかを判断する -->
          <h2 class="result__text--incorrect">不正解</h2>
          <!-- 不正解の場合、この部分が表示される -->
        <?php endif; ?>
        <!-- if文の終了 -->
      </div>
      <!-- phpで用意されたステータスコードと説明の値を表示して正解の情報をユーザーに伝えている -->
      <div class="answer-table">
        <!-- このセクション全体を囲むコンテナ　　CSSを整えるために使われる -->
        <table class="answer-table__inner">
          <!-- 表を作成するためのタグ -->
          <tr class="answer-table__row">
            <!-- テーブルの行を定義する -->
            <th class="answer-table__header">ステータスコード</th>
            <!-- テーブルの見出し　ヘッダーのセル　　この部分にphpを使って、ステータスコードとその説明の値がそれぞれ動的に挿入される -->
            <td class="answer-table__text">
              <?php echo $code ?>
            </td>
            
          </tr>
          <tr class="answer-table__row">
            <th class="answer-table__header">説明</th>
            <td class="answer-table__text">
              <?php echo $description ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </main>
</body>

</html>