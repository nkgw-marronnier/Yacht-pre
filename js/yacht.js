/*
サイコロアニメーション部分は
https://torisky.com/javascript：サイコロを振る/を参考にした。
© 1970 人生は読めないブログ.
効果音は
https://taira-komori.jpn.org/index.htmlより拝借した。
Taira Komori All Rights Reserved.
*/

var count; // 変化しているように見せる回数
var $id = function (id) {
  return document.getElementById(id);
};
var sai0 = 0,
  sai1 = 0,
  sai2 = 0,
  sai3 = 0,
  sai4 = 0;
var randomsai = new Array(0, 0, 0, 0, 0);
var koma = new Array(0, 0, 0, 0, 0);
var hanteiyou = new Array(0, 0, 0, 0, 0, 0);
var hantei = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
var hanteib = new Array(1, 2, 3, 4, 5, 6);
var saikorocount = 0;
var namaea = [
  "Ac",
  "Du",
  "Th",
  "Fo",
  "Fi",
  "Si",
  "Ch",
  "Fu",
  "Fd",
  "Ss",
  "Bs",
  "Yc",
];

function furu1() {
  //サイコロの初期値絵柄指定
  var sai1p = "../../saikoro/0.png";
  $id("saikoro0").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
  $id("saikoro1").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
  $id("saikoro2").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
  $id("saikoro3").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
  $id("saikoro4").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
}
function furu2() {
  //出目に合わせたサイコロの絵柄指定/パス指定
  if (koma[0] == 0) {
    sai0 = Math.floor(Math.random() * 6) + 1; // 1から6までの適当な数字
    randomsai[0] = sai0;
    var sai0p = "../../saikoro/" + sai0 + ".png"; // 画像ファイル名生成
  } else {
    var sai0p = "../../saikoro/0.png";
  }
  if (koma[1] == 0) {
    sai1 = Math.floor(Math.random() * 6) + 1;
    randomsai[1] = sai1;
    var sai1p = "../../saikoro/" + sai1 + ".png";
  } else {
    var sai1p = "../../saikoro/0.png";
  }
  if (koma[2] == 0) {
    sai2 = Math.floor(Math.random() * 6) + 1;
    randomsai[2] = sai2;
    var sai2p = "../../saikoro/" + sai2 + ".png";
  } else {
    var sai2p = "../../saikoro/0.png";
  }
  if (koma[3] == 0) {
    sai3 = Math.floor(Math.random() * 6) + 1;
    randomsai[3] = sai3;
    var sai3p = "../../saikoro/" + sai3 + ".png";
  } else {
    var sai3p = "../../saikoro/0.png";
  }
  if (koma[4] == 0) {
    sai4 = Math.floor(Math.random() * 6) + 1;
    randomsai[4] = sai4;
    var sai4p = "../../saikoro/" + sai4 + ".png";
  } else {
    var sai4p = "../../saikoro/0.png";
  }
  //サイコロ絵柄ファイルパス指定
  $id("saikoro0").innerHTML =
    "<img src='" + sai0p + "' width='64' height='64'>";
  $id("saikoro1").innerHTML =
    "<img src='" + sai1p + "' width='64' height='64'>";
  $id("saikoro2").innerHTML =
    "<img src='" + sai2p + "' width='64' height='64'>";
  $id("saikoro3").innerHTML =
    "<img src='" + sai3p + "' width='64' height='64'>";
  $id("saikoro4").innerHTML =
    "<img src='" + sai4p + "' width='64' height='64'>";
}

//サイコロアニメーション
function anime() {
  if (count > 25) {
    // 25回ほどランダムに振る
    count = 0;
    if (
      koma[0] != 0 &&
      koma[1] != 0 &&
      koma[2] != 0 &&
      koma[3] != 0 &&
      koma[4] != 0
    ) {
      //サイコロを全てえらんだら無効化
      $id("botan").disabled = "true";
      $id("keisan").disabled = "";
    } else if (saikorocount > 2) {
      //サイコロを2回以上振れないようにする
      $id("botan").disabled = "true";
      if (saikorocount < 2) {
        //2回以上でもえらぶボタンは使用可能
        $id("0").disabled = "";
        $id("1").disabled = "";
        $id("2").disabled = "";
        $id("3").disabled = "";
        $id("4").disabled = "";
      }
      //計算ボタン有効化
      $id("keisan").disabled = "";
    } else {
      //それにも該当しなければ役選択以外は有効化
      $id("botan").disabled = "";
      $id("0").disabled = "";
      $id("1").disabled = "";
      $id("2").disabled = "";
      $id("3").disabled = "";
      $id("4").disabled = "";
      $id("keisan").disabled = "";
    }
    return 0;
  }
  //サイコロを振る関数呼び出し
  furu2();

  //サイコロ振りはじめと振り終わりに効果音
  if (count == 0 || count >= 25) {
    var audio_saikoro = new Audio("../../sound/crrect_answer1.mp3");
    audio_saikoro.volume = 0.1;
    audio_saikoro.play();
  }
  count++;
  // 50ミリ秒間隔で表示切り替え
  setTimeout(anime, 50);
}

function saikoro(button) {
  count = 0;
  //えらぶボタンと振るボタン、計算ボタンを無効化
  $id("botan").disabled = "true";
  $id("0").disabled = "true";
  $id("1").disabled = "true";
  $id("2").disabled = "true";
  $id("3").disabled = "true";
  $id("4").disabled = "true";
  $id("keisan").disabled = "true";
  //サイコロを振るボタンのvalue指定
  if (button.id == "botan") {
    if (saikorocount == 2) {
      button.value = "これで目を決める";
    } else if (saikorocount == 1) {
      button.value = "賽を振る<残り1回>";
    } else if (saikorocount == 0) {
      button.value = "賽を振る<残り2回>";
    }
  }
  //サイコロを振った回数をカウント
  saikorocount++;
  // サイコロアニメ開始
  anime();
}

function erabu(button) {
  //ボタン選択・解除効果音の指定
  var audio_sentaku = new Audio("../../sound/button06.mp3");
  var audio_kaijo = new Audio("../../sound/button05.mp3");
  audio_sentaku.volume = 0.1;
  audio_kaijo.volume = 0.1;
  //1番目のえらぶボタン処理
  if (button.id == 0) {
    if (koma[0] == 0) {
      audio_sentaku.play();
      koma[0] = sai0;
      button.value = "はずす";
    } else {
      audio_kaijo.play();
      koma[0] = 0;
      button.value = "えらぶ";
    }
  }
  //2番目のえらぶボタン処理
  if (button.id == 1) {
    if (koma[1] == 0) {
      audio_sentaku.play();
      koma[1] = sai1;
      button.value = "はずす";
    } else {
      audio_kaijo.play();
      koma[1] = 0;
      button.value = "えらぶ";
    }
  }
  //3番目のえらぶボタン処理
  if (button.id == 2) {
    if (koma[2] == 0) {
      audio_sentaku.play();
      koma[2] = sai2;
      button.value = "はずす";
    } else {
      audio_kaijo.play();
      koma[2] = 0;
      button.value = "えらぶ";
    }
  }
  //4番目のえらぶボタン処理
  if (button.id == 3) {
    if (koma[3] == 0) {
      audio_sentaku.play();
      koma[3] = sai3;
      button.value = "はずす";
    } else {
      audio_kaijo.play();
      koma[3] = 0;
      button.value = "えらぶ";
    }
  }
  //5番目のえらぶボタン処理
  if (button.id == 4) {
    if (koma[4] == 0) {
      audio_sentaku.play();
      koma[4] = sai4;
      button.value = "はずす";
    } else {
      audio_kaijo.play();
      koma[4] = 0;
      button.value = "えらぶ";
    }
  }
  //サイコロ絵柄指定関数呼び出し
  eranda();
}

function eranda() {
  //サイコロ絵柄ファイルパス指定
  var koma0p = "../../saikoro/" + koma[0] + ".png";
  var koma1p = "../../saikoro/" + koma[1] + ".png";
  var koma2p = "../../saikoro/" + koma[2] + ".png";
  var koma3p = "../../saikoro/" + koma[3] + ".png";
  var koma4p = "../../saikoro/" + koma[4] + ".png";
  //サイコロ出目絵柄出力
  $id("saikoro5").innerHTML =
    "<img src='" + koma0p + "' width='64' height='64'>";
  $id("saikoro6").innerHTML =
    "<img src='" + koma1p + "' width='64' height='64'>";
  $id("saikoro7").innerHTML =
    "<img src='" + koma2p + "' width='64' height='64'>";
  $id("saikoro8").innerHTML =
    "<img src='" + koma3p + "' width='64' height='64'>";
  $id("saikoro9").innerHTML =
    "<img src='" + koma4p + "' width='64' height='64'>";
}

function keisanmae() {
  //役計算終了の効果音再生
  var audio_keisan = new Audio("../../sound/crrect_answer2.mp3");
  audio_keisan.volume = 0.1;
  audio_keisan.play();
  //えらぶボタンとサイコロを振るボタン無効化
  //計算ボタンも無効化
  $id("0").disabled = "true";
  $id("1").disabled = "true";
  $id("2").disabled = "true";
  $id("3").disabled = "true";
  $id("4").disabled = "true";
  $id("botan").disabled = "true";
  $id("keisan").disabled = "true";
  //選ばれていない出目を埋める
  for (var i = 0; i < 5; i++) {
    if (koma[i] == 0) {
      koma[i] = randomsai[i];
    }
  }
  //約選択ボタン有効化
  $id("a").disabled = "";
  $id("b").disabled = "";
  $id("c").disabled = "";
  $id("d").disabled = "";
  $id("e").disabled = "";
  $id("f").disabled = "";
  $id("g").disabled = "";
  $id("h").disabled = "";
  $id("i").disabled = "";
  $id("j").disabled = "";
  $id("k").disabled = "";
  $id("l").disabled = "";
  //サイコロ絵柄変更
  eranda();

  //判定用配列に選んだ出目の配列を複製
  hanteiyou = koma.slice();
  //役計算関数呼び出し
  keisan();
}

function keisan() {
  //判定用配列を判定しやすいように事前に昇順ソート
  hanteiyou.sort(function (a, b) {
    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
  });
  //エース判定
  var ace = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 1) {
      ace++; //1が出たらカウント
    }
  }
  hantei[0] = ace;
  //デュース判定
  var duce = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 2) {
      duce = duce + 2; //2が出た回数のみ2を加算
    }
  }
  hantei[1] = duce;
  //スリー判定
  var three = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 3) {
      three = three + 3; //3が出た回数のみ3を加算
    }
  }
  hantei[2] = three;
  //フォー判定
  var four = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 4) {
      four = four + 4; //4が出た回数のみ4を加算
    }
  }
  hantei[3] = four;
  //ファイブ判定
  var five = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 5) {
      five = five + 5; //5が出た回数のみ5を加算
    }
  }
  hantei[4] = five;
  //シックス判定
  var six = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == 6) {
      six = six + 6; //6が出た回数6を加算
    }
  }
  hantei[5] = six;
  //チョイス判定
  var choice = 0;
  for (var i = 0; i < 5; i++) {
    choice = choice + hanteiyou[i]; //単純合計
  }
  hantei[6] = choice;
  //フルハウス判定
  var fullhouse = 0;
  var hantei1 = 0;
  var hantei2 = 0;
  var A = 0,
    B = 0;
  for (var i = 0; i < 6; i++) {
    for (var j = 0; j < 5; j++) {
      if (hanteiyou[j] == hanteib[i]) {
        hantei1++; //同値の値があればカウント
      }
    }
    if (hantei1 == 3) {
      A = i + 1; //同値が3つあればAにi+1を格納
    } else if (hantei1 == 2) {
      B = i + 1; //同値が2つあればBにi+1を格納
    }
    hantei1 = 0;
  }
  if (A == 0 || B == 0) {
    A = 0; //フルハウスでなければA,B初期化
    B = 0;
  }
  fullhouse = A * 3 + B * 2;
  hantei[7] = fullhouse;
  (hantei1 = 0), (A = 0), (B = 0);
  //フォーダイス判定
  var fourdice = 0;
  for (var i = 0; i < 6; i++) {
    for (var j = 0; j < 5; j++) {
      if (hanteiyou[j] == hanteib[i]) {
        hantei1++; //同値があればカウント
      }
    }
    if (hantei1 == 1) {
      A = i + 1; //1個だけの値をAに格納
    } else if (hantei1 >= 4) {
      B = i + 1; //4つの同値の出目をBに格納
    }
    hantei1 = 0;
  }
  if (B != 0) {
    fourdice = A + B * 4; //Bが0でないなら計算
  }
  (A = 0), (B = 0);
  hantei[8] = fourdice;
  //S.ストレート判定
  var smallstraight = 0;
  hantei1 = 0;
  hantei2 = 0;
  var hantei3 = 0,
    hantei4 = 0,
    hantei5 = 0,
    hantei6 = 0;
  var renzok1 = 0,
    renzok2 = 0,
    renzok3 = 0;
  for (var i = 0; i < 4; i++) {
    if (hanteiyou[i] == i + 1) {
      hantei1++; //連続した値ならカウント
    } else if (hanteiyou[i + 1] == i + 1 && hanteiyou[i] == i && renzok1 <= 3) {
      hantei1++; //同値でも次が連続ならカウント
      renzok1++;
    }
    if (hanteiyou[i] == i + 2) {
      hantei2++; //連続した値ならカウント
    } else if (
      hanteiyou[i + 1] == i + 2 &&
      hanteiyou[i] == i + 1 &&
      renzok2 <= 3
    ) {
      hantei2++; //同値でも次が連続ならカウント
      renzok2++;
    }
    if (hanteiyou[i] == i + 3) {
      hantei3++; //連続した値ならカウント
    } else if (
      hanteiyou[i + 1] == i + 3 &&
      hanteiyou[i] == i + 2 &&
      renzok3 <= 3
    ) {
      hantei3++; //同値でも次が連続ならカウント
      renzok3++;
    }

    if (hanteiyou[i + 1] == i + 1) {
      hantei4++; //0番目を無視して連続していればカウント
    }
    if (hanteiyou[i + 1] == i + 2) {
      hantei5++; //0番目を無視して連続していればカウント
    }
    if (hanteiyou[i + 1] == i + 3) {
      hantei6++; //0番目を無視して連続していればカウント
    }
  }
  if (
    hantei1 >= 4 ||
    hantei2 >= 4 ||
    hantei3 >= 4 ||
    hantei4 >= 4 ||
    hantei5 >= 4 ||
    hantei6 >= 4
  ) {
    smallstraight = 15; //4つの連続した値があれば有効
  }
  hantei[9] = smallstraight;
  (hantei1 = 0), (hantei2 = 0), (hantei3 = 0);
  //B.ストレート判定
  var bigstraight = 0;
  for (var i = 0; i < 5; i++) {
    if (hanteiyou[i] == i + 1) {
      hantei1++; //連続していればカウント
    } else if (hanteiyou[i] == i + 2) {
      hantei2++; //連続していればカウント
    }
  }
  if (hantei1 == 5 || hantei2 == 5) {
    bigstraight = 30;
  }
  hantei[10] = bigstraight;
  (hantei1 = 0), (hantei2 = 0);
  //ヨット役判定
  var yacht = 0;
  for (var i = 0; i < 6; i++) {
    for (var j = 0; j < 5; j++) {
      if (hanteiyou[j] == hanteib[i]) {
        hantei1++; //同値ならカウント
      }
    }
    if (hantei1 == 5) {
      yacht = 50; //5つの連続があれば有効
      break;
    }
    hantei1 = 0;
  }
  hantei[11] = yacht;
  hantei1 = 0;
  //役得点表作成
  table();
}

/*
https://developer.mozilla.org/ja/docs/Web/API/Document_Object_Model/Traversing_an_HTML_table_with_JavaScript_and_DOM_Interfacesを参考に作成。
出典情報
著者
Marcio Galli
引用元
http://web.archive.org/web/20000815054125/http://mozilla.org/docs/dom/technote/tn-dom-table/
*/
//役得点表出力
function table() {
  //bodyの参照を取得
  var body = document.getElementsByTagName("body")[0];
  //<table>と<table body>要素を作成
  var tbl = document.createElement("table");
  var tblBody = document.createElement("tbody");

  //すべてのセルを作成
  for (var i = 0; i < 2; i++) {
    //<tr>要素を作成
    var row = document.createElement("tr");

    for (var j = 0; j < 12; j++) {
      //<td>要素を作成
      //テキストノードを作成
      //<td>セルを<tr>行へ追加
      var cell = document.createElement("td");
      if (i % 2 == 0) {
        var cellText = document.createTextNode(namaea[j]);
      } else {
        var cellText = document.createTextNode(hantei[j]);
      }
      cell.appendChild(cellText);
      row.appendChild(cell);
    }
    //<tr>の行を<table body>へ追加
    tblBody.appendChild(row);
  }

  //<tbody>を<table>へ追加
  tbl.appendChild(tblBody);
  //<table>を<body>へ追加
  body.appendChild(tbl);
  //mytableのborder属性を1に設定
  tbl.setAttribute("border", "1");
  //テーブルクラスをyakuに設定
  tbl.className = "yaku";
  //計算ボタンを無効化
  $id("keisan").disabled = "true";
}

//起動時実行
window.onload = function () {
  furu1(); // サイコロ初期化

  //えらぶボタンを無効化
  $id("0").disabled = "true";
  $id("1").disabled = "true";
  $id("2").disabled = "true";
  $id("3").disabled = "true";
  $id("4").disabled = "true";

  //計算ボタンを無効化
  $id("keisan").disabled = "true";

  //役選択ボタンを無効化
  $id("a").disabled = "true";
  $id("b").disabled = "true";
  $id("c").disabled = "true";
  $id("d").disabled = "true";
  $id("e").disabled = "true";
  $id("f").disabled = "true";
  $id("g").disabled = "true";
  $id("h").disabled = "true";
  $id("i").disabled = "true";
  $id("j").disabled = "true";
  $id("k").disabled = "true";
  $id("l").disabled = "true";

  eranda();

  //ようこそ効果音
  var audio_youkoso = new Audio("../../sound/crrect_answer3.mp3");
  audio_youkoso.volume = 0.1;
  audio_youkoso.play();
};
