<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="author" content="nkgw-marronnier">
  <meta name="format-detection" content="telephone=no, email=no, address=no">
  <meta name="robots" content="noindex, nofollow, noarchive, noimageindex, notranslate">
  <link rel="stylesheet" href="../../css/yacht_style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/99/three.min.js"></script>
  <script src="../../js/yacht.js"></script>
  <link rel="icon" href="../../ico/0.ico">
  <link rel="stylesheet" href="../../css/lightbox.min.css">
  <title>ヨット -Yacht-</title>
</head>

<body onselectstart="return false;" onmousedown="return false;">
  <canvas id="canvas"></canvas>
  <h1>ヨット -Yacht- 友人戦</h1>

  <script type="text/javascript">
  //広場に戻る際の警告
    function keikoku() {
      if (window.confirm("このままページを離れるとゲームは振り出しに戻ります。離れる場合は「はい」、取り消す場合は「取消」をクリックしてください。")) {
        window.alert("今回はヨット -Yacht-を遊んでいただき、ありがとうございました。対局終了の際は対戦相手にしっかり了承をとってから退席してください。");
        document.location.href = "../../top.html";
      } else {};
    }

    //役選択ボタンを押すとその点と役が代入される
    function tensuu(button) {
      //エースのボタン押下
      if (button.id == 'a') {
        document.getElementById('yaku1').value = namaea[0];
        document.getElementById('tensu1').value = hantei[0];
      }
      //デュースのボタン押下
      if (button.id == 'b') {
        document.getElementById('yaku1').value = namaea[1];
        document.getElementById('tensu1').value = hantei[1];
      }
      //スリーのボタン押下
      if (button.id == 'c') {
        document.getElementById('yaku1').value = namaea[2];
        document.getElementById('tensu1').value = hantei[2];
      }
      //フォーのボタン押下
      if (button.id == 'd') {
        document.getElementById('yaku1').value = namaea[3];
        document.getElementById('tensu1').value = hantei[3];
      }
      //ファイブのボタン押下
      if (button.id == 'e') {
        document.getElementById('yaku1').value = namaea[4];
        document.getElementById('tensu1').value = hantei[4];
      }
      //シックスのボタン押下
      if (button.id == 'f') {
        document.getElementById('yaku1').value = namaea[5];
        document.getElementById('tensu1').value = hantei[5];
      }
      //チョイスのボタン押下
      if (button.id == 'g') {
        document.getElementById('yaku1').value = namaea[6];
        document.getElementById('tensu1').value = hantei[6];
      }
      //フルハウスのボタン押下
      if (button.id == 'h') {
        document.getElementById('yaku1').value = namaea[7];
        document.getElementById('tensu1').value = hantei[7];
      }
      //フォーダイスのボタン押下
      if (button.id == 'i') {
        document.getElementById('yaku1').value = namaea[8];
        document.getElementById('tensu1').value = hantei[8];
      }
      //S.ストレートのボタン押下
      if (button.id == 'j') {
        document.getElementById('yaku1').value = namaea[9];
        document.getElementById('tensu1').value = hantei[9];
      }
      //B.ストレートのボタン押下
      if (button.id == 'k') {
        document.getElementById('yaku1').value = namaea[10];
        document.getElementById('tensu1').value = hantei[10];
      }
      //ヨットのボタン押下
      if (button.id == 'l') {
        document.getElementById('yaku1').value = namaea[11];
        document.getElementById('tensu1').value = hantei[11];
      }
    }
  </script>

  <div class="scorehyou">

    <?php
    //プレイヤ氏名取得
    if (isset($_POST['namae1'])) {
      $namae1 = $_POST['namae1'];
    } else {
      $namae1 = "AAAA";
    }
    if (isset($_POST['namae2'])) {
      $namae2 = $_POST['namae2'];
    } else {
      $namae2 = "BBBB";
    }
    //先手の役得点取得
    if (isset($_POST['ace1'])) {
      $ace1 = $_POST['ace1'];
    } else {
      $ace1 = 0;
    }
    if (isset($_POST['duce1'])) {
      $duce1 = $_POST['duce1'];
    } else {
      $duce1 = 0;
    }
    if (isset($_POST['three1'])) {
      $three1 = $_POST['three1'];
    } else {
      $three1 = 0;
    }
    if (isset($_POST['four1'])) {
      $four1 = $_POST['four1'];
    } else {
      $four1 = 0;
    }
    if (isset($_POST['five1'])) {
      $five1 = $_POST['five1'];
    } else {
      $five1 = 0;
    }
    if (isset($_POST['six1'])) {
      $six1 = $_POST['six1'];
    } else {
      $six1 = 0;
    }
    if (isset($_POST['choice1'])) {
      $choice1 = $_POST['choice1'];
    } else {
      $choice1 = 0;
    }
    if (isset($_POST['fullhouse1'])) {
      $fullhouse1 = $_POST['fullhouse1'];
    } else {
      $fullhouse1 = 0;
    }
    if (isset($_POST['fourdice1'])) {
      $fourdice1 = $_POST['fourdice1'];
    } else {
      $fourdice1 = 0;
    }
    if (isset($_POST['smallstraight1'])) {
      $smallstraight1 = $_POST['smallstraight1'];
    } else {
      $smallstraight1 = 0;
    }
    if (isset($_POST['bigstraight1'])) {
      $bigstraight1 = $_POST['bigstraight1'];
    } else {
      $bigstraight1 = 0;
    }
    if (isset($_POST['yacht1'])) {
      $yacht1 = $_POST['yacht1'];
    } else {
      $yacht1 = 0;
    }
    if (isset($_POST['sum1'])) {
      $sum1 = $_POST['sum1'];
    } else {
      $sum1 = 0;
    }
    //先手の役と点数取得
    if (isset($_POST['yaku1'])) {
      $yaku1 = $_POST['yaku1'];
    } else {
      $yaku1 = 'AA';
    }
    if (isset($_POST['tensu1'])) {
      $tensu1 = $_POST['tensu1'];
    } else {
      $tensu1 = 0;
    }
    //後手の役点数取得
    if (isset($_POST['ace2'])) {
      $ace2 = $_POST['ace2'];
    } else {
      $ace2 = 0;
    }
    if (isset($_POST['duce2'])) {
      $duce2 = $_POST['duce2'];
    } else {
      $duce2 = 0;
    }
    if (isset($_POST['three2'])) {
      $three2 = $_POST['three2'];
    } else {
      $three2 = 0;
    }
    if (isset($_POST['four2'])) {
      $four2 = $_POST['four2'];
    } else {
      $four2 = 0;
    }
    if (isset($_POST['five2'])) {
      $five2 = $_POST['five2'];
    } else {
      $five2 = 0;
    }
    if (isset($_POST['six2'])) {
      $six2 = $_POST['six2'];
    } else {
      $six2 = 0;
    }
    if (isset($_POST['choice2'])) {
      $choice2 = $_POST['choice2'];
    } else {
      $choice2 = 0;
    }
    if (isset($_POST['fullhouse2'])) {
      $fullhouse2 = $_POST['fullhouse2'];
    } else {
      $fullhouse2 = 0;
    }
    if (isset($_POST['fourdice2'])) {
      $fourdice2 = $_POST['fourdice2'];
    } else {
      $fourdice2 = 0;
    }
    if (isset($_POST['smallstraight2'])) {
      $smallstraight2 = $_POST['smallstraight2'];
    } else {
      $smallstraight2 = 0;
    }
    if (isset($_POST['bigstraight2'])) {
      $bigstraight2 = $_POST['bigstraight2'];
    } else {
      $bigstraight2 = 0;
    }
    if (isset($_POST['yacht2'])) {
      $yacht2 = $_POST['yacht2'];
    } else {
      $yacht2 = 0;
    }
    if (isset($_POST['sum2'])) {
      $sum2 = $_POST['sum2'];
    } else {
      $sum2 = 0;
    }
    //試合回数取得
    if (isset($_POST['siaikaisu'])) {
      $siaikaisu = $_POST['siaikaisu'];
    } else {
      $siaikaisu = 0;
    }
    //先手の役履歴取得
    if (isset($_POST['ace_1'])) {
      $ace_1 = $_POST['ace_1'];
    } else {
      $ace_1 = 0;
    }
    if (isset($_POST['duce_1'])) {
      $duce_1 = $_POST['duce_1'];
    } else {
      $duce_1 = 0;
    }
    if (isset($_POST['three_1'])) {
      $three_1 = $_POST['three_1'];
    } else {
      $three_1 = 0;
    }
    if (isset($_POST['four_1'])) {
      $four_1 = $_POST['four_1'];
    } else {
      $four_1 = 0;
    }
    if (isset($_POST['five_1'])) {
      $five_1 = $_POST['five_1'];
    } else {
      $five_1 = 0;
    }
    if (isset($_POST['six_1'])) {
      $six_1 = $_POST['six_1'];
    } else {
      $six_1 = 0;
    }
    if (isset($_POST['choice_1'])) {
      $choice_1 = $_POST['choice_1'];
    } else {
      $choice_1 = 0;
    }
    if (isset($_POST['fullhouse_1'])) {
      $fullhouse_1 = $_POST['fullhouse_1'];
    } else {
      $fullhouse_1 = 0;
    }
    if (isset($_POST['fourdice_1'])) {
      $fourdice_1 = $_POST['fourdice_1'];
    } else {
      $fourdice_1 = 0;
    }
    if (isset($_POST['smallstraight_1'])) {
      $smallstraight_1 = $_POST['smallstraight_1'];
    } else {
      $smallstraight_1 = 0;
    }
    if (isset($_POST['bigstraight_1'])) {
      $bigstraight_1 = $_POST['bigstraight_1'];
    } else {
      $bigstraight_1 = 0;
    }
    if (isset($_POST['yacht_1'])) {
      $yacht_1 = $_POST['yacht_1'];
    } else {
      $yacht_1 = 0;
    }
    //後手の役履歴取得
    if (isset($_POST['ace_2'])) {
      $ace_2 = $_POST['ace_2'];
    } else {
      $ace_2 = 0;
    }
    if (isset($_POST['duce_2'])) {
      $duce_2 = $_POST['duce_2'];
    } else {
      $duce_2 = 0;
    }
    if (isset($_POST['three_2'])) {
      $three_2 = $_POST['three_2'];
    } else {
      $three_2 = 0;
    }
    if (isset($_POST['four_2'])) {
      $four_2 = $_POST['four_2'];
    } else {
      $four_2 = 0;
    }
    if (isset($_POST['five_2'])) {
      $five_2 = $_POST['five_2'];
    } else {
      $five_2 = 0;
    }
    if (isset($_POST['six_2'])) {
      $six_2 = $_POST['six_2'];
    } else {
      $six_2 = 0;
    }
    if (isset($_POST['choice_2'])) {
      $choice_2 = $_POST['choice_2'];
    } else {
      $choice_2 = 0;
    }
    if (isset($_POST['fullhouse_2'])) {
      $fullhouse_2 = $_POST['fullhouse_2'];
    } else {
      $fullhouse_2 = 0;
    }
    if (isset($_POST['fourdice_2'])) {
      $fourdice_2 = $_POST['fourdice_2'];
    } else {
      $fourdice_2 = 0;
    }
    if (isset($_POST['smallstraight_2'])) {
      $smallstraight_2 = $_POST['smallstraight_2'];
    } else {
      $smallstraight_2 = 0;
    }
    if (isset($_POST['bigstraight_2'])) {
      $bigstraight_2 = $_POST['bigstraight_2'];
    } else {
      $bigstraight_2 = 0;
    }
    if (isset($_POST['yacht_2'])) {
      $yacht_2 = $_POST['yacht_2'];
    } else {
      $yacht_2 = 0;
    }
    //後手の役・点数取得
    if (isset($_POST['yaku2'])) {
      $yaku2 = $_POST['yaku2'];
    } else {
      $yaku2 = 'AA';
    }
    if (isset($_POST['tensu2'])) {
      $tensu2 = $_POST['tensu2'];
    } else {
      $tensu2 = 0;
    }
    //後手の役点数を判別・代入
    if ($yaku2 == 'Ac') {
      $ace2 = $tensu2;
      $ace_2 = 1;
    } else if ($yaku2 == 'Du') {
      $duce2 = $tensu2;
      $duce_2 = 1;
    } else if ($yaku2 == 'Th') {
      $three2 = $tensu2;
      $three_2 = 1;
    } else if ($yaku2 == 'Fo') {
      $four2 = $tensu2;
      $four_2 = 1;
    } else if ($yaku2 == 'Fi') {
      $five2 = $tensu2;
      $five_2 = 1;
    } else if ($yaku2 == 'Si') {
      $six2 = $tensu2;
      $six_2 = 1;
    } else if ($yaku2 == 'Ch') {
      $choice2 = $tensu2;
      $choice_2 = 1;
    } else if ($yaku2 == 'Fu') {
      $fullhouse2 = $tensu2;
      $fullhouse_2 = 1;
    } else if ($yaku2 == 'Fd') {
      $fourdice2 = $tensu2;
      $fourdice_2 = 1;
    } else if ($yaku2 == 'Ss') {
      $smallstraight2 = $tensu2;
      $smallstraight_2 = 1;
    } else if ($yaku2 == 'Bs') {
      $bigstraight2 = $tensu2;
      $bigstraight_2 = 1;
    } else if ($yaku2 == 'Yc') {
      $yacht2 = $tensu2;
      $yacht_2 = 1;
    }

    //後手の合計点を計算
    $sum2 = $ace2 + $duce2 + $three2 + $four2 + $five2 + $six2 + $choice2 + $fullhouse2 + $fourdice2 + $smallstraight2 + $bigstraight2 + $yacht2;

    //試合回数を計算（役取得履歴から）
    $siaikaisu = $ace_1 + $duce_1 + $three_1 + $four_1 + $five_1 + $six_1 + $choice_1 + $fullhouse_1 + $fourdice_1 + $smallstraight_1 + $bigstraight_1 + $yacht_1 + $ace_2 + $duce_2 + $three_2 + $four_2 + $five_2 + $six_2 + $choice_2 + $fullhouse_2 + $fourdice_2 + $smallstraight_2 + $bigstraight_2 + $yacht_2;

    //後手が最後の役を決めたら結果を
    //セッションに格納してresult.phpへ遷移
    if ($siaikaisu >= 24) {
      session_start();
      $_SESSION['namae1'] = $namae1;
      $_SESSION['namae2'] = $namae2;
      $_SESSION['ace1'] = $ace1;
      $_SESSION['duce1'] = $duce1;
      $_SESSION['three1'] = $three1;
      $_SESSION['four1'] = $four1;
      $_SESSION['five1'] = $five1;
      $_SESSION['six1'] = $six1;
      $_SESSION['choice1'] = $choice1;
      $_SESSION['fullhouse1'] = $fullhouse1;
      $_SESSION['fourdice1'] = $fourdice1;
      $_SESSION['smallstraight1'] = $smallstraight1;
      $_SESSION['bigstraight1'] = $bigstraight1;
      $_SESSION['yacht1'] = $yacht1;
      $_SESSION['sum1'] = $sum1;
      $_SESSION['ace2'] = $ace2;
      $_SESSION['duce2'] = $duce2;
      $_SESSION['three2'] = $three2;
      $_SESSION['four2'] = $four2;
      $_SESSION['five2'] = $five2;
      $_SESSION['six2'] = $six2;
      $_SESSION['choice2'] = $choice2;
      $_SESSION['fullhouse2'] = $fullhouse2;
      $_SESSION['fourdice2'] = $fourdice2;
      $_SESSION['smallstraight2'] = $smallstraight2;
      $_SESSION['bigstraight2'] = $bigstraight2;
      $_SESSION['yacht2'] = $yacht2;
      $_SESSION['sum2'] = $sum2;
      header('Location: double_result.php');
      exit;
    }

    //現在の手番を表示
    echo "<strong class='teban'>現在の手番：</strong><strong class='namae'>" . $namae1 . "</strong><font size=4 color='white'> 氏</font>";

    //配列にプレイヤ名と役得点を格納
    $ary = ["役／プレイヤ" => [$namae1, $namae2], "エース Ac" => [$ace1, $ace2], "デュース Du" => [$duce1, $duce2], "スリー Th" => [$three1, $three2], "フォー Fo" => [$four1, $four2], "ファイブ Fi" => [$five1, $five2], "シックス Si" => [$six1, $six2], "チョイス Ch" => [$choice1, $choice2], "フルハウス Fu" => [$fullhouse1, $fullhouse2], "フォーダイス Fd" => [$fourdice1, $fourdice2], "S. ストレート Ss" => [$smallstraight1, $smallstraight2], "B. ストレート Bs" => [$bigstraight1, $bigstraight2], "ヨット Yc" => [$yacht1, $yacht2], "合計" => [$sum1, $sum2]];

    //得点表作成
    echo "<table border='1' class='score' style='border-collapse: collapse'>";

    foreach ($ary as $key => $val) {
      echo "<tr><td>" . $key . "</td><td>" . $val[0] . "</td><td>" . $val[1] . "</td></tr>";
    }

    echo "</table>";

    ?>

    <script type="text/javascript">
    //選べる役を役履歴から判定
      function kakunin() {
        //phpから先手の役履歴を取得
        var a1 = <?php echo $ace_1; ?>;
        var b1 = <?php echo $duce_1; ?>;
        var c1 = <?php echo $three_1; ?>;
        var d1 = <?php echo $four_1; ?>;
        var e1 = <?php echo $five_1; ?>;
        var f1 = <?php echo $six_1; ?>;
        var g1 = <?php echo $choice_1; ?>;
        var h1 = <?php echo $fullhouse_1; ?>;
        var i1 = <?php echo $fourdice_1; ?>;
        var j1 = <?php echo $smallstraight_1; ?>;
        var k1 = <?php echo $bigstraight_1; ?>;
        var l1 = <?php echo $yacht_1; ?>;

        //既に選んだ役は使用不能にする
        if (a1 != 0) {
          $id("a").value = "選択済み";
          $id("a").disabled = "true";
        }
        if (b1 != 0) {
          $id("b").value = "選択済み";
          $id("b").disabled = "true";
        }
        if (c1 != 0) {
          $id("c").value = "選択済み";
          $id("c").disabled = "true";
        }
        if (d1 != 0) {
          $id("d").value = "選択済み";
          $id("d").disabled = "true";
        }
        if (e1 != 0) {
          $id("e").value = "選択済み";
          $id("e").disabled = "true";
        }
        if (f1 != 0) {
          $id("f").value = "選択済み";
          $id("f").disabled = "true";
        }
        if (g1 != 0) {
          $id("g").value = "選択済み";
          $id("g").disabled = "true";
        }
        if (h1 != 0) {
          $id("h").value = "選択済み";
          $id("h").disabled = "true";
        }
        if (i1 != 0) {
          $id("i").value = "選択済み";
          $id("i").disabled = "true";
        }
        if (j1 != 0) {
          $id("j").value = "選択済み";
          $id("j").disabled = "true";
        }
        if (k1 != 0) {
          $id("k").value = "選択済み";
          $id("k").disabled = "true";
        }
        if (l1 != 0) {
          $id("l").value = "選択済み";
          $id("l").disabled = "true";
        }
      }
    </script>

  </div>

  <div class="koma">
    <div id="saikoro5"></div>
    <div id="saikoro6"></div>
    <div id="saikoro7"></div>
    <div id="saikoro8"></div>
    <div id="saikoro9"></div>
  </div>

  <div class="botangun">
    <input type="button" id="0" value="えらぶ" class="botankoko" onclick="erabu(this)"><br>
    <input type="button" id="1" value="えらぶ" class="botankoko" onclick="erabu(this)"><br>
    <input type="button" id="2" value="えらぶ" class="botankoko" onclick="erabu(this)"><br>
    <input type="button" id="3" value="えらぶ" class="botankoko" onclick="erabu(this)"><br>
    <input type="button" id="4" value="えらぶ" class="botankoko" onclick="erabu(this)"><br>
  </div>

  </div>
  <div class="saikorofuru">
    <div class="furu">
      <div id="saikoro0"></div>
      <div id="saikoro1"></div>
      <div id="saikoro2"></div>
      <div id="saikoro3"></div>
      <div id="saikoro4"></div>
    </div>

    <input type="button" id="botan" value="さいころをふる" class="furukoko" onclick="saikoro(this);kakunin()">

  </div>

  <div class="setumei1">
    <strong>選択賽</strong>
  </div>

  <div class="setumei2">
    <strong>振る賽</strong>
  </div>

  <input type="button" value="広場へ戻る" class="restart" id="restart" onClick="keikoku()">

  <div class="keisanhyou">

    <form action="double_gote.php" method="POST">

      <input button type="submit" id="a" value="エース Ac" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="b" value="デュース Du" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="c" value="スリー Th" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="d" value="フォー Fo" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="e" value="ファイブ Fi" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="f" value="シックス Si" class="keisan" onclick="tensuu(this)"><br>
      <input button type="submit" id="g" value="チョイス Ch" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="h" value="フルハウス Fu" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="i" value="フォーダイス Fd" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="j" value="S. ストレート Ss" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="k" value="B. ストレート Bs" class="keisan" onclick="tensuu(this)">
      <input button type="submit" id="l" value="ヨット Yc" class="keisan" onclick="tensuu(this)"><br>
      <input type="button" value="点数計算する" class="keisan" id="keisan" onclick="keisanmae();kakunin()">

      <input type="hidden" name="yaku1" id="yaku1">
      <input type="hidden" name="tensu1" id="tensu1">

      <input type="hidden" name="ace1" value=<?php echo $ace1; ?>>
      <input type="hidden" name="duce1" value=<?php echo $duce1; ?>>
      <input type="hidden" name="three1" value=<?php echo $three1; ?>>
      <input type="hidden" name="four1" value=<?php echo $four1; ?>>
      <input type="hidden" name="five1" value=<?php echo $five1; ?>>
      <input type="hidden" name="six1" value=<?php echo $six1; ?>>
      <input type="hidden" name="choice1" value=<?php echo $choice1; ?>>
      <input type="hidden" name="fullhouse1" value=<?php echo $fullhouse1; ?>>
      <input type="hidden" name="fourdice1" value=<?php echo $fourdice1; ?>>
      <input type="hidden" name="smallstraight1" value=<?php echo $smallstraight1; ?>>
      <input type="hidden" name="bigstraight1" value=<?php echo $bigstraight1; ?>>
      <input type="hidden" name="yacht1" value=<?php echo $yacht1; ?>>
      <input type="hidden" name="sum1" value=<?php echo $sum1; ?>>
      <input type="hidden" name="namae1" value=<?php echo $namae1; ?>>

      <input type="hidden" name="ace_1" value=<?php echo $ace_1; ?>>
      <input type="hidden" name="duce_1" value=<?php echo $duce_1; ?>>
      <input type="hidden" name="three_1" value=<?php echo $three_1; ?>>
      <input type="hidden" name="four_1" value=<?php echo $four_1; ?>>
      <input type="hidden" name="five_1" value=<?php echo $five_1; ?>>
      <input type="hidden" name="six_1" value=<?php echo $six_1; ?>>
      <input type="hidden" name="choice_1" value=<?php echo $choice_1; ?>>
      <input type="hidden" name="fullhouse_1" value=<?php echo $fullhouse_1; ?>>
      <input type="hidden" name="fourdice_1" value=<?php echo $fourdice_1; ?>>
      <input type="hidden" name="smallstraight_1" value=<?php echo $smallstraight_1; ?>>
      <input type="hidden" name="bigstraight_1" value=<?php echo $bigstraight_1; ?>>
      <input type="hidden" name="yacht_1" value=<?php echo $yacht_1; ?>>

      <input type="hidden" name="ace2" value=<?php echo $ace2; ?>>
      <input type="hidden" name="duce2" value=<?php echo $duce2; ?>>
      <input type="hidden" name="three2" value=<?php echo $three2; ?>>
      <input type="hidden" name="four2" value=<?php echo $four2; ?>>
      <input type="hidden" name="five2" value=<?php echo $five2; ?>>
      <input type="hidden" name="six2" value=<?php echo $six2; ?>>
      <input type="hidden" name="choice2" value=<?php echo $choice2; ?>>
      <input type="hidden" name="fullhouse2" value=<?php echo $fullhouse2; ?>>
      <input type="hidden" name="fourdice2" value=<?php echo $fourdice2; ?>>
      <input type="hidden" name="smallstraight2" value=<?php echo $smallstraight2; ?>>
      <input type="hidden" name="bigstraight2" value=<?php echo $bigstraight2; ?>>
      <input type="hidden" name="yacht2" value=<?php echo $yacht2; ?>>
      <input type="hidden" name="sum2" value=<?php echo $sum2; ?>>
      <input type="hidden" name="namae2" value=<?php echo $namae2; ?>>

      <input type="hidden" name="ace_2" value=<?php echo $ace_2; ?>>
      <input type="hidden" name="duce_2" value=<?php echo $duce_2; ?>>
      <input type="hidden" name="three_2" value=<?php echo $three_2; ?>>
      <input type="hidden" name="four_2" value=<?php echo $four_2; ?>>
      <input type="hidden" name="five_2" value=<?php echo $five_2; ?>>
      <input type="hidden" name="six_2" value=<?php echo $six_2; ?>>
      <input type="hidden" name="choice_2" value=<?php echo $choice_2; ?>>
      <input type="hidden" name="fullhouse_2" value=<?php echo $fullhouse_2; ?>>
      <input type="hidden" name="fourdice_2" value=<?php echo $fourdice_2; ?>>
      <input type="hidden" name="smallstraight_2" value=<?php echo $smallstraight_2; ?>>
      <input type="hidden" name="bigstraight_2" value=<?php echo $bigstraight_2; ?>>
      <input type="hidden" name="yacht_2" value=<?php echo $yacht_2; ?>>

    </form>

  </div>

  <div class="hint">
    <a href="../../yaku/yaku.png" data-lightbox="hint">役種確認</a>
  </div>

  </div>

  <script src="../../js/lightbox.min.js"></script>
  <script src="../../js/haikei.js"></script>

</body>

</html>