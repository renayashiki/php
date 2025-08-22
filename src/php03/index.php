<?php

require_once('config/status_codes.php');
// config/status_codes.php というファイルを読み込みます

$random_indexes = array_rand($status_codes, 4);
// $status_codes 配列からランダムに4つのキー（インデックス）を取得します
// array_rand はキーを返す関数なので、$random_indexes にはランダムなキーが4つ入る

foreach ($random_indexes as $index) {
  $options[] = $status_codes[$index];
}
// $random_indexes に入っているキーを使って実際のデータを $options 配列に入れていく


$question = $options[mt_rand(0, 3)];
// $question = ... は、「取り出したものを入れる箱。
// 4つの選択肢($option)の引き出しの中からランダムで1つを問題文として選ぶ

// mt_rand(0, 3)はくじひきマシーンで0から3までの整数をランダムに選んでくれる機能。 

          ?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Status Code Quiz</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <!--cssリセット　(ブラウザごとのデフォルト差をなくす)  -->
  <link rel="stylesheet" href="css/common.css">
  <!-- 全体に共通のデザインをまとめたcss -->
  <link rel="stylesheet" href="css/index.css">
  <!-- このページ専用のcss -->
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <!-- ヘッダー部分 -->
      <a class="header__logo" href="/">
        Status Code Quiz
      </a>
      <!-- ロゴにリンクを作成。クリックするとトップページに -->
    </div>
  </header>

  <main>
    <!-- メインコンテンツ -->

    <div class="quiz__content">
      <div class="question">
        <p class="question__text">Q. 以下の内容に当てはまるステータスコードを選んでください</p>
        <p class="question__text">
        <!-- 問題文を表示するエリア -->

          <?php echo $question['description'] ?>
        </p>
        <!-- 連想配列で設定したdiscriptionを 呼び出す-->
      </div>

      <form class="quiz-form" action="result.php" method="post">
        <!-- 回答フォーム -->

        <input type="hidden" name="answer_code" value="<?php echo $question['code'] ?>">
        <!-- 正解のステータスコードを隠しデータとして送信 -->


        <div class="quiz-form__item">
          <?php foreach ($options as $option) : ?>
            <div class="quiz-form__group">
          <!-- ラジオボタンで選択肢を表示 -->


              <input class="quiz-form__radio" 
              id="<?php echo $option['code'] ?>" type="radio" 
              name="option" 
              value="<?php echo $option['code'] ?>">
            <!-- ラジオボタン(選択肢) -->

              <label class="quiz-form__label" for="<?php echo $option['code'] ?>">
                <?php echo $option['code'] ?>
              </label>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- 回答ボタン -->
         
        <div class="quiz-form__button">
          <button class="quiz-form__button-submit" type="submit">
            回答
          </button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>