<?php
session_start();
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}

if (!isset($_SESSION['data'])) {
    header('Location:product.php');
    exit();
}
$prod = $_SESSION['data'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProductComp</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>

<body>

  <!--入力画面-->

  <?php include('header.php'); ?>
  <div class="productconf">
    <div class="cb">
      <h4>Product Upload</h4>
    </div>

    <div class="producntconf">
      <h4>
        Press Back to correct the content.</h4>
    </div>

    <form action="productcomp.php" method="POST">
      <div class="productconf">
        <h4> <label>Product</label><br></h4>
        <div class="line"></div>
        <h4> <?php echo htmlspecialchars($prod['product']); ?><br></h4>
      </div>

      <div class="productconf">
        <h4><label>Category</label><br></h4>
        <div class="line"></div>
        <h4> <?php echo htmlspecialchars($prod['category']); ?><br></h4>
      </div>

      <div class="productconf">
        <h4><label>Creater</label><br></h4>
        <div class="line"></div>
        <h4> <?php echo htmlspecialchars($prod['creater']); ?><br></h4>
      </div>

      <div class="productconf">
        <h4><label>Price</label><br></h4>
        <div class="line"></div>
        <h4> <?php
              echo htmlspecialchars($prod['price']); ?><br></h4>
      </div>

      <div class="productconf">
        <h4><label>Overview</label><br></h4>
        <div class="line"></div>
        <h4> <?php echo nl2br(htmlspecialchars($prod['overview'])); ?><br></h4>


        <div class="productconf">

          <br>
          <h4> <button type="submit" inputname="submit">Send</button></h4>

          <br>
          <h4> <button type="submit" inputname="submit"><a href="product.php" class="return-btn">Back</a></button></h4>
        </div>

      </div>

  </div>


  <div id="footer">
    <?php include("footer.php") ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      var $header = $("header"),
        animationClass = "is-animation";

      $(window).scroll(function() {
        var value = $(this).scrollTop();
        if (value > 100) {
          $header.addClass(animationClass);
        } else {
          $header.removeClass(animationClass);
        }
      });
    });
    $(function() {
      var $header = $("nav"),
        animationClass = "is-animation2";

      $(window).scroll(function() {
        var value = $(this).scrollTop();
        if (value > 100) {
          $header.addClass(animationClass);
        } else {
          $header.removeClass(animationClass);
        }
      });
    });
    window.onload = function() {
      /*各画面オブジェクト*/
      const btnSubmit = document.getElementById('btnSubmit');
      const fullname = document.getElementById('fullname');
      const katakana = document.getElementById('katakana');
      const phone = document.getElementById('phone');
      const email = document.getElementById('email');
      const messagee = document.getElementById('message');
      const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;


      btnSubmit.addEventListener('click', function(event) {
        let message = [];
        /*入力値チェック*/
        if (fullname.value == "") {
          message.push("氏名が未入力です。");
        }
        if (katakana.value == "") {
          message.push("フリガナが未入力です。");
        }
        if (phone.value == "") {
          message.push("電話番号が不正です。");
        }
        if (email.value == "") {
          message.push("メールアドレスが未入力です。");
        } else if (!reg.test(email.value)) {
          message.push("メールアドレスの形式が不正です。");
        }
        if (message.value == "") {
          message.push("本文が未入力です。");
        }
        if (message.length > 0) {
          alert(message);
          return;
        }
        alert('入力チェックOK');
      });
    };
  </script>
</body>

</html>