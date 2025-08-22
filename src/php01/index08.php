<?php

// クラスオブジェクト指向
// 設計図のようなもの　/　設計図のようなものを使ったプログラミングの組み立て方

class Character{
  //  メンバ変数
  // ヒットポイント(hp)
  public $hitPoint;

  // メンバメゾット(関数)
  // 戦う
  function hit () {
    echo "攻撃した! <br>";
  }

  // 逃げる
  function runAway (){
    echo "逃げた！　<br>";
  }
}

