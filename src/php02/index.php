<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>World Clock</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/php02/index.php">
        World Clock
      </a>
    </div>
  </header>

  <main>
    <!-- メインコンテンツ部分の開始 -->
    <div class="search-form__content">
      <!-- 検索フォーム全体を囲むコンテナ　ピンク -->
      <div class="search-form__heading">
        <!-- フォームの見出し部分　黄色 -->
        <h2>日本と世界の時間を比較</h2>
        <!-- 見出し2　タイトル -->
      </div>
      <form class="search-form" action= "result.php" method "get">
        <!-- データをURLの末尾につけてresult.phpへ送信 -->
        <div class="search-form__item">
          <!-- フォームの入力項目(都市選択) -->
          <select class="search-form__item-select" name="city">
            <!-- 都市を選択するプルダウンメニュー -->
             <!-- 選択された都市をcityという名前で送信-->
              <option vulue="シドニー">シドニー</option>
              <option value="上海">上海</option>
              <option value="モスクワ">モスクワ</option>
              <option value="ロンドン">ロンドン</option>
              <option value="ヨハネスブルグ">ヨハネスブルグ</option>
              <option value="ニューヨーク">ニューヨーク</option>
            <!-- 都市の選択肢(valueの値が送信される) -->
          </select>
        </div>
        
        <div class="search-form__button">
          <!-- 検索ボタン部分 -->
          <button class="search-form__button-submit" type="submit">
            <!-- クリックするとフォームが送信される -->
            検索
          </button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>