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
    //double_sente.phpからセッションデータを受け取る
    session_start();
    $namae1 = $_SESSION['namae1'];
    $namae2 = $_SESSION['namae2'];
    $ace1 = $_SESSION['ace1'];
    $duce1 = $_SESSION['duce1'];
    $three1 = $_SESSION['three1'];
    $four1 = $_SESSION['four1'];
    $five1 = $_SESSION['five1'];
    $six1 = $_SESSION['six1'];
    $choice1 = $_SESSION['choice1'];
    $fullhouse1 = $_SESSION['fullhouse1'];
    $fourdice1 = $_SESSION['fourdice1'];
    $smallstraight1 = $_SESSION['smallstraight1'];
    $bigstraight1 = $_SESSION['bigstraight1'];
    $yacht1 = $_SESSION['yacht1'];
    $sum1 = $_SESSION['sum1'];
    $ace2 = $_SESSION['ace2'];
    $duce2 = $_SESSION['duce2'];
    $three2 = $_SESSION['three2'];
    $four2 = $_SESSION['four2'];
    $five2 = $_SESSION['five2'];
    $six2 = $_SESSION['six2'];
    $choice2 = $_SESSION['choice2'];
    $fullhouse2 = $_SESSION['fullhouse2'];
    $fourdice2 = $_SESSION['fourdice2'];
    $smallstraight2 = $_SESSION['smallstraight2'];
    $bigstraight2 = $_SESSION['bigstraight2'];
    $yacht2 = $_SESSION['yacht2'];
    $sum2 = $_SESSION['sum2'];
    $bonus1 = 0;
    $bonus2 = 0;
    //エースからシックスまでの役を小計
    $syoukei1 = $ace1 + $duce1 + $three1 + $four1 + $five1 + $six1;
    $syoukei2 = $ace2 + $duce2 + $three2 + $four2 + $five2 + $six2;
    //小計が63点以上ならボーナス点35付加
    if ($syoukei1 >= 63) {
      $bonus1 = 35;
    }
    if ($syoukei2 >= 63) {
      $bonus2 = 35;
    }
    //合計とボーナスの合算で勝敗判定
    if ($sum1 + $bonus1 > $sum2 + $bonus2) {
      echo "<strong class='kekka'>試合結果：</strong><strong class='namae'>" . $namae1 . "</strong><strong class='kekka'> 氏の</strong><strong class='happyou'>勝利!!</strong>";
    } else if ($sum1 + $bonus1 < $sum2 + $bonus2) {
      echo "<strong class='kekka'>試合結果：</strong><strong class='namae'>" . $namae2 . "</strong><strong class='kekka'> 氏の</strong><strong class='happyou'>勝利!!</strong>";
    } else {
      echo "<strong class='kekka'>試合結果：</strong><strong class='namae'><strong class='happyou'>両者引き分け!!</strong>";
    }

    //配列にプレイヤ名と得点、小計、ボーナスを格納
    $ary = ["役／プレイヤ" => [$namae1, $namae2], "エース Ac" => [$ace1, $ace2], "デュース Du" => [$duce1, $duce2], "スリー Th" => [$three1, $three2], "フォー Fo" => [$four1, $four2], "ファイブ Fi" => [$five1, $five2], "シックス Si" => [$six1, $six2], "小計" => [$syoukei1, $syoukei2], "小計ボーナス" => [$bonus1, $bonus2], "チョイス Ch" => [$choice1, $choice2], "フルハウス Fu" => [$fullhouse1, $fullhouse2], "フォーダイス Fd" => [$fourdice1, $fourdice2], "S. ストレート Ss" => [$smallstraight1, $smallstraight2], "B. ストレート Bs" => [$bigstraight1, $bigstraight2], "ヨット Yc" => [$yacht1, $yacht2], "合計" => [$sum1 + $bonus1, $sum2 + $bonus2]];

    //得点表作成
    echo "<table border='1' class='score' style='border-collapse: collapse'>";

    foreach ($ary as $key => $val) {
      echo "<tr><td>" . $key . "</td><td>" . $val[0] . "</td><td>" . $val[1] . "</td></tr>";
    }

    echo "</table>";

    ?>

    <input type="submit" class="botan" name="submit" value="広場へ戻る" onClick="location.href='../../top.html'">

  </div>

  <script src="../../js/haikei.js"></script>

</body>

</html>