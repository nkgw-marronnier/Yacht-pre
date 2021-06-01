<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="author" content="nkgw-marronnier">
  <meta name="format-detection" content="telephone=no, email=no, address=no">
  <meta name="robots" content="noindex, nofollow, noarchive, noimageindex, notranslate">
  <link rel="stylesheet" href="../../css/result_style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/99/three.min.js"></script>
  <title>ヨット -Yacht-</title>
  <link rel="icon" href="../../ico/0.ico">
</head>

<body onselectstart="return false;" onmousedown="return false;">
  <canvas id="canvas"></canvas>

  <div class="ray">

    <h1>ヨット -Yacht-</h1>

    <script type="text/javascript">
    //ようこそ効果音
      var audio_tensuu = new Audio("../../sound/crrect_answer3.mp3");
      audio_tensuu.volume = 0.1;
      audio_tensuu.play();
    </script>

    <?php
    //single_sente.phpからセッションで送信された
    //値を変数に代入していく
    session_start();
    $namae = $_SESSION['namae'];
    $ace = $_SESSION['ace'];
    $duce = $_SESSION['duce'];
    $three = $_SESSION['three'];
    $four = $_SESSION['four'];
    $five = $_SESSION['five'];
    $six = $_SESSION['six'];
    $choice = $_SESSION['choice'];
    $fullhouse = $_SESSION['fullhouse'];
    $fourdice = $_SESSION['fourdice'];
    $smallstraight = $_SESSION['smallstraight'];
    $bigstraight = $_SESSION['bigstraight'];
    $yacht = $_SESSION['yacht'];
    $sum = $_SESSION['sum'];
    $bonus = 0;
    //エースからシックスまでの得点を小計
    $syoukei = $ace + $duce + $three + $four + $five + $six;

    //小計が63以上ならボーナス35点付加
    if ($syoukei >= 63) {
      $bonus = 35;
    }

    ///試合結果表示(個人戦のため勝敗なし)
    echo "<br><strong class='kekka'>試合結果：</strong><strong class='kekka'>個人戦のため勝敗無し</strong>";

    //配列にプレイヤ名と得点を格納
    $ary = ["役／プレイヤ" => $namae, "エース Ac" => $ace, "デュース Du" => $duce, "スリー Th" => $three, "フォー Fo" => $four, "ファイブ Fi" => $five, "シックス Si" => $six, "小計" => $syoukei, "小計ボーナス" => $bonus, "チョイス Ch" => $choice, "フルハウス Fu" => $fullhouse,  "フォーダイス Fd" => $fourdice,  "S. ストレート Ss" => $smallstraight, "B. ストレート Bs" => $bigstraight,  "ヨット Yc" => $yacht,  "合計" => $sum + $bonus];

    //得点表作成
    echo "<table border='1' class='score' style='border-collapse: collapse'>";

    foreach ($ary as $key => $val) {
      echo "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
    }

    echo "</table>";

    ?>

    <input type="submit" class="botan" name="submit" value="広場へ戻る" onClick="location.href='../../top.html'">

  </div>

  <script src="../../js/haikei.js"></script>

</body>

</html>