<?php

function searchCityTime($city_name)
{
  //searchCityTimeという名前の関数(機能のまとまり)を定義している。
  // この関数は、引数として$city_name(探したい都市の名前)を受け取る

  require('config/cities.php');
  // require関数を使って、外部ファイル「config/cities.php」を読み込んでいる
  // このファイルには各都市の情報(名前、タイムゾーン等)が配列として保存されている。

  foreach ($cities as $city) {
    // $citiesという配列の各要素を一つずつ順番に取り出し、$cityという変数に代入して繰り返す。
    // つまり、このループは配列に入っている全ての都市をチェックするために使われる。

    if ($city['name'] === $city_name) {
      // もし、今調べている都市の「name」と、探している都市の名前「$city_name」が完全に一致したら

$date_time= new DateTime("", new DateTimeZone($city[time_zone]));
//  現在時刻を取得するためのdateTimeオブジェクトを新しく作ります。
// 第二引数で、その都市のタイムゾーンの時刻を指定。

$time = $date_time->format('H:i');
// DateTimeオブジェクトを使って、時間を「時:分」の形式で取得する。

$city['time'] = $time;
// 取得した時間を、元々の都市情報($city)の配列に「time」というキーで追加する。

      return $city;
      // 探していた都市が見つかり、時間が追加できたからその都市の情報($city)を変えして関数の処理を終了する。
    }
  }
}
