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
  <h1>ヨット -Yacht- 個人戦</h1>

  <script type="text/javascript">
  //広場へ戻る際の警告
    function keikoku() {
      if (window.confirm("このままページを離れるとゲームは振り出しに戻ります。離れる場合は「はい」、取り消す場合は「取消」をクリックしてください。")) {
        window.alert("今回はヨット -Yacht-を遊んでいただき、ありがとうございました。またのお越しをお待ちしております。");
        document.location.href = "../../top.html";
      } else {};
    }

    //役選択ボタンを押すとその点と役が代入される
    function tensuu(button) {
      //エースのボタン押下
      if (button.id == "a") {
        document.getElementById('yaku').value = namaea[0];
        document.getElementById('tensu').value = hantei[0];
      }
      //デュースのボタン押下
      if (button.id == "b") {
        document.getElementById('yaku').value = namaea[1];
        document.getElementById('tensu').value = hantei[1];
      }
      //スリーのボタン押下
      if (button.id == "c") {
        document.getElementById('yaku').value = namaea[2];
        document.getElementById('tensu').value = hantei[2];
      }
      //フォーのボタン押下
      if (button.id == "d") {
        document.getElementById('yaku').value = namaea[3];
        document.getElementById('tensu').value = hantei[3];
      }
      //ファイブのボタン押下
      if (button.id == "e") {
        document.getElementById('yaku').value = namaea[4];
        document.getElementById('tensu').value = hantei[4];
      }
      //シックスのボタン押下
      if (button.id == "f") {
        document.getElementById('yaku').value = namaea[5];
        document.getElementById('tensu').value = hantei[5];
      }
      //チョイスのボタン押下
      if (button.id == "g") {
        document.getElementById('yaku').value = namaea[6];
        document.getElementById('tensu').value = hantei[6];
      }
      //フルハウスのボタン押下
      if (button.id == "h") {
        document.getElementById('yaku').value = namaea[7];
        document.getElementById('tensu').value = hantei[7];
      }
      //フォーダイスのボタン押下
      if (button.id == "i") {
        document.getElementById('yaku').value = namaea[8];
        document.getElementById('tensu').value = hantei[8];
      }
      //S.ストレートのボタン押下
      if (button.id == "j") {
        document.getElementById('yaku').value = namaea[9];
        document.getElementById('tensu').value = hantei[9];
      }
      //B.ストレートのボタン押下
      if (button.id == "k") {
        document.getElementById('yaku').value = namaea[10];
        document.getElementById('tensu').value = hantei[10];
      }
      //ヨットのボタン押下
      if (button.id == "l") {
        document.getElementById('yaku').value = namaea[11];
        document.getElementById('tensu').value = hantei[11];
      }
    }
  </script>

  <div class="scorehyou">

    <?php
    //名前取得
    if (isset($_POST['namae'])) {
      $namae = $_POST['namae'];
    } else {
      $namae = '個人戦';
    }
    //役得点取得
    if (isset($_POST['ace'])) {
      $ace = $_POST['ace'];
    } else {
      $ace = 0;
    }
    if (isset($_POST['duce'])) {
      $duce = $_POST['duce'];
    } else {
      $duce = 0;
    }
    if (isset($_POST['three'])) {
      $three = $_POST['three'];
    } else {
      $three = 0;
    }
    if (isset($_POST['four'])) {
      $four = $_POST['four'];
    } else {
      $four = 0;
    }
    if (isset($_POST['five'])) {
      $five = $_POST['five'];
    } else {
      $five = 0;
    }
    if (isset($_POST['six'])) {
      $six = $_POST['six'];
    } else {
      $six = 0;
    }
    if (isset($_POST['choice'])) {
      $choice = $_POST['choice'];
    } else {
      $choice = 0;
    }
    if (isset($_POST['fullhouse'])) {
      $fullhouse = $_POST['fullhouse'];
    } else {
      $fullhouse = 0;
    }
    if (isset($_POST['fourdice'])) {
      $fourdice = $_POST['fourdice'];
    } else {
      $fourdice = 0;
    }
    if (isset($_POST['smallstraight'])) {
      $smallstraight = $_POST['smallstraight'];
    } else {
      $smallstraight = 0;
    }
    if (isset($_POST['bigstraight'])) {
      $bigstraight = $_POST['bigstraight'];
    } else {
      $bigstraight = 0;
    }
    if (isset($_POST['yacht'])) {
      $yacht = $_POST['yacht'];
    } else {
      $yacht = 0;
    }
    if (isset($_POST['sum'])) {
      $sum = $_POST['sum'];
    } else {
      $sum = 0;
    }
    //役・点数取得
    if (isset($_POST['yaku'])) {
      $yaku = $_POST['yaku'];
    } else {
      $yaku = 'AA';
    }
    if (isset($_POST['tensu'])) {
      $tensu = $_POST['tensu'];
    } else {
      $tensu = 0;
    }
    //役履歴取得
    if (isset($_POST['ace_'])) {
      $ace_ = $_POST['ace_'];
    } else {
      $ace_ = 0;
    }
    if (isset($_POST['duce_'])) {
      $duce_ = $_POST['duce_'];
    } else {
      $duce_ = 0;
    }
    if (isset($_POST['three_'])) {
      $three_ = $_POST['three_'];
    } else {
      $three_ = 0;
    }
    if (isset($_POST['four_'])) {
      $four_ = $_POST['four_'];
    } else {
      $four_ = 0;
    }
    if (isset($_POST['five_'])) {
      $five_ = $_POST['five_'];
    } else {
      $five_ = 0;
    }
    if (isset($_POST['six_'])) {
      $six_ = $_POST['six_'];
    } else {
      $six_ = 0;
    }
    if (isset($_POST['choice_'])) {
      $choice_ = $_POST['choice_'];
    } else {
      $choice_ = 0;
    }
    if (isset($_POST['fullhouse_'])) {
      $fullhouse_ = $_POST['fullhouse_'];
    } else {
      $fullhouse_ = 0;
    }
    if (isset($_POST['fourdice_'])) {
      $fourdice_ = $_POST['fourdice_'];
    } else {
      $fourdice_ = 0;
    }
    if (isset($_POST['smallstraight_'])) {
      $smallstraight_ = $_POST['smallstraight_'];
    } else {
      $smallstraight_ = 0;
    }
    if (isset($_POST['bigstraight_'])) {
      $bigstraight_ = $_POST['bigstraight_'];
    } else {
      $bigstraight_ = 0;
    }
    if (isset($_POST['yacht_'])) {
      $yacht_ = $_POST['yacht_'];
    } else {
      $yacht_ = 0;
    }
    //訳履歴判定
    if ($yaku == 'Ac') {
      $ace = $tensu;
      $ace_ = 1;
    } else if ($yaku == 'Du') {
      $duce = $tensu;
      $duce_ = 1;
    } else if ($yaku == 'Th') {
      $three = $tensu;
      $three_ = 1;
    } else if ($yaku == 'Fo') {
      $four = $tensu;
      $four_ = 1;
    } else if ($yaku == 'Fi') {
      $five = $tensu;
      $five_ = 1;
    } else if ($yaku == 'Si') {
      $six = $tensu;
      $six_ = 1;
    } else if ($yaku == 'Ch') {
      $choice = $tensu;
      $choice_ = 1;
    } else if ($yaku == 'Fu') {
      $fullhouse = $tensu;
      $fullhouse_ = 1;
    } else if ($yaku == 'Fd') {
      $fourdice = $tensu;
      $fourdice_ = 1;
    } else if ($yaku == 'Ss') {
      $smallstraight = $tensu;
      $smallstraight_ = 1;
    } else if ($yaku == 'Bs') {
      $bigstraight = $tensu;
      $bigstraight_ = 1;
    } else if ($yaku == 'Yc') {
      $yacht = $tensu;
      $yacht_ = 1;
    }

    //合計点合算
    $sum = $ace + $duce + $three + $four + $five + $six + $choice + $fullhouse + $fourdice + $smallstraight + $bigstraight + $yacht;

    //現在の手番表示(個人戦固定)
    echo "<strong class='teban'>現在の手番：</strong><strong class='namae'>" . $namae . "</strong>";

    //配列にプレイヤ名と得点を格納
    $ary = ["役／プレイヤ" => $namae, "エース Ac" => $ace, "デュース Du" => $duce, "スリー Th" => $three, "フォー Fo" => $four, "ファイブ Fi" => $five, "シックス Si" => $six, "チョイス Ch" => $choice, "フルハウス Fu" => $fullhouse, "フォーダイス Fd" => $fourdice, "S. ストレート Ss" => $smallstraight, "B. ストレート Bs" => $bigstraight, "ヨット Yc" => $yacht, "合計" => $sum];

    //得点表作成
    echo "<table border='1' class='score' style='border-collapse: collapse'>";

    foreach ($ary as $key => $val) {
      echo "<tr><td>" . $key . "</td><td>" . $val . "</td></tr>";
    }

    echo "</table>";

    ?>

    <script type="text/javascript">
    //既に選んだ役は選択できないようにする
      function kakunin() {
        //phpから役選択履歴を取得
        var a = <?php echo $ace_; ?>;
        var b = <?php echo $duce_; ?>;
        var c = <?php echo $three_; ?>;
        var d = <?php echo $four_; ?>;
        var e = <?php echo $five_; ?>;
        var f = <?php echo $six_; ?>;
        var g = <?php echo $choice_; ?>;
        var h = <?php echo $fullhouse_; ?>;
        var i = <?php echo $fourdice_; ?>;
        var j = <?php echo $smallstraight_; ?>;
        var k = <?php echo $bigstraight_; ?>;
        var l = <?php echo $yacht_; ?>;

        //既に取得済みならばボタンを無効化
        if (a != 0) {
          $id("a").value = "選択済み";
          $id("a").disabled = "true";
        }
        if (b != 0) {
          $id("b").value = "選択済み";
          $id("b").disabled = "true";
        }
        if (c != 0) {
          $id("c").value = "選択済み";
          $id("c").disabled = "true";
        }
        if (d != 0) {
          $id("d").value = "選択済み";
          $id("d").disabled = "true";
        }
        if (e != 0) {
          $id("e").value = "選択済み";
          $id("e").disabled = "true";
        }
        if (f != 0) {
          $id("f").value = "選択済み";
          $id("f").disabled = "true";
        }
        if (g != 0) {
          $id("g").value = "選択済み";
          $id("g").disabled = "true";
        }
        if (h != 0) {
          $id("h").value = "選択済み";
          $id("h").disabled = "true";
        }
        if (i != 0) {
          $id("i").value = "選択済み";
          $id("i").disabled = "true";
        }
        if (j != 0) {
          $id("j").value = "選択済み";
          $id("j").disabled = "true";
        }
        if (k != 0) {
          $id("k").value = "選択済み";
          $id("k").disabled = "true";
        }
        if (l != 0) {
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

    <form action="single_sente.php" method="POST">

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

      <input type="hidden" name="yaku" id="yaku">
      <input type="hidden" name="tensu" id="tensu">

      <input type="hidden" name="ace" value=<?php echo $ace; ?>>
      <input type="hidden" name="duce" value=<?php echo $duce; ?>>
      <input type="hidden" name="three" value=<?php echo $three; ?>>
      <input type="hidden" name="four" value=<?php echo $four; ?>>
      <input type="hidden" name="five" value=<?php echo $five; ?>>
      <input type="hidden" name="six" value=<?php echo $six; ?>>
      <input type="hidden" name="choice" value=<?php echo $choice; ?>>
      <input type="hidden" name="fullhouse" value=<?php echo $fullhouse; ?>>
      <input type="hidden" name="fourdice" value=<?php echo $fourdice; ?>>
      <input type="hidden" name="smallstraight" value=<?php echo $smallstraight; ?>>
      <input type="hidden" name="bigstraight" value=<?php echo $bigstraight; ?>>
      <input type="hidden" name="yacht" value=<?php echo $yacht; ?>>
      <input type="hidden" name="sum" value=<?php echo $sum; ?>>
      <input type="hidden" name="namae" value=<?php echo $namae; ?>>

      <input type="hidden" name="ace_" value=<?php echo $ace_; ?>>
      <input type="hidden" name="duce_" value=<?php echo $duce_; ?>>
      <input type="hidden" name="three_" value=<?php echo $three_; ?>>
      <input type="hidden" name="four_" value=<?php echo $four_; ?>>
      <input type="hidden" name="five_" value=<?php echo $five_; ?>>
      <input type="hidden" name="six_" value=<?php echo $six_; ?>>
      <input type="hidden" name="choice_" value=<?php echo $choice_; ?>>
      <input type="hidden" name="fullhouse_" value=<?php echo $fullhouse_; ?>>
      <input type="hidden" name="fourdice_" value=<?php echo $fourdice_; ?>>
      <input type="hidden" name="smallstraight_" value=<?php echo $smallstraight_; ?>>
      <input type="hidden" name="bigstraight_" value=<?php echo $bigstraight_; ?>>
      <input type="hidden" name="yacht_" value=<?php echo $yacht_; ?>>

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