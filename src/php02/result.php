<?php
// 必要な関数ファイルを読み込む
// 
require_once('functions/search_city_time.php');
// 'functions/search_city_time.php' の中に定義されている関数を使えるようにする

$tokyo = searchCityTime('東京');
// 東京の時刻を取得
// 画像ファイル名、都市名、現地時間を連想配列として返す関数

$city = htmlspecialchars($_GET['city'], ENT_QUOTES);
// URLで選択されたデータを取得

$comparison = searchCityTime($city);
// 選択された都市の画像、都市名、時刻を配列で受け取る

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- IEに最新のモードを使わせる設定 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- スマホでもタブレットでも見やすく表示する設定 -->
  <title>World Clock</title>
  <link rel="stylesheet" href="css/sanitize.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/result.css">
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <!-- ページ上部のヘッダー -->
      <a class="header__logo" href="/php02/index.php">
        <!-- サイト名をクリックするとトップのindex.phpへ移動するリンク -->
        World Clock
      </a>
    </div>
  </header>

  <main>
    <!-- メインコンテンツ -->
    <div class="result__content">
      <!-- 結果表示全体を囲むコンテナ -->
      <div class="result-cards">
        <!-- カードを複数並べるためのコンテナ -->

        <div class="result-card">
          <div class="result-card__img-wrapper">
            <!--東京の結果カード  -->

            <img class="result-card__img" src="img/<?php echo $tokyo['img'] ?>" alt="国旗">
          </div>
          <!--PHPで取得した東京の画像を表示  -->
          <!--$tokyo['img']→　国旗画像ファイル名  -->

          <div class="result-card__body">
            <p class="result-card__city">
              <?php echo $tokyo['name'] ?>
            </p>
            <!-- 東京の都市名を表示 -->

            <p class="result-card__time">
              <?php echo $tokyo['time'] ?>
            </p>
            <!-- 東京の都市名を表示 -->
          </div>
        </div>

        <!-- 選択都市の結果カード -->
        <div class="result-card">
          <div class="result-card__img-wrapper">

            <!-- 選択した都市の国旗画像を表示-->
            <img class="result-card__img" src="img/<?php echo $comparison['img'] ?>" alt="国旗">
          </div>

          <div class="result-card__body">
            <p class="result-card__city">
              <?php echo $comparison['name'] ?>
            </p>
            <!-- 選択した都市名を表示 -->

            <p class="result-card__time">
              <?php echo $comparison['time'] ?>
            </p>
            <!-- 選択した都市の時刻を表示-->
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>


<!-- $comparison = searchCityTime($city); -->
<!-- この関数は引数としている$cityという変数に保存されている都市の名前を渡す関数。 -->
<!-- $cityに”東京”という文字が入っていれば、東京の情報を渡してくれる -->
<!-- 関数は処理が終わると、見つかった都市の情報(名前、タイムゾーン、新しく追加された現在時刻など)を返す -->
<!-- 関数から返された情報全体を$comparisonという新しい変数に代入する→　これにより、$comparisonという変数を使えば、いつでも都市の情報を参照できるようになる。 -->

