<?php
session_start();
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}

if (!isset($_SESSION['data'])) {
    header('Location:contact.php');
    exit();
}
$contacts = $_SESSION['data'];



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cofirm</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>

<body>

  <!--入力画面-->

  <?php include('header.php'); ?>
  <div class="confirm">
    <div class="cb">
      <h>Inquiry</h>
    </div>

    <div class="contactbox2">
      <a>Please check the following contents and press the send button.<br>
        Press Back to correct the content.</a>
    </div>

    <form action="complete.php" method="POST">
      <div class="conftitle">
        <h4><label>Fullname</label><br>
          <br>
          <div class="line"></div>
          <br>
          <?php echo htmlspecialchars($contacts['fullname']); ?><br>
      </div>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <div class="conftitle">
        <h4><label>Furigana</label><br>
          <br>
          <div class="line"></div>
          <br>
          <?php echo htmlspecialchars($contacts['katakana']); ?>
      </div>
      </h4>
      <br>
      <div class="line"></div>

      <br>
      <div class="conftitle">
        <h4><label>Tel</label><br>
          <br>
          <div class="line"></div>
          <br>
          <?php echo htmlspecialchars($contacts['phone']); ?><br>
      </div>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <div class="conftitle">
        <h4><label>Email</label><br>
          <br>
          <div class="line"></div>
          <br>
          <?php
            echo htmlspecialchars($contacts['email']); ?><br>
      </div>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <div class="conftitle2">
        <h4><label>Contents of inquiry</label><br>
          <br>
          <div class="line"></div>
          <br>
          <?php echo nl2br(htmlspecialchars($contacts['message'])); ?><br>
      </div>
      </h4>

      <dd class="bt">

        <br>
        <h4><button type="submit" inputname="submit">Send</button></h4>

        <br>
        <h4> <button type="submit" inputname="submit"><a href="contact.php" class="return-btn">Back</a></button></h4>
      </dd>

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
          message.push("Please enter your name.");
        }
        if (katakana.value == "") {
          message.push("Please enter the fuligana.");
        }
        if (phone.value == "") {
          message.push("Please enter your phone number.");
        }
        if (email.value == "") {
          message.push("Please enter your email address correctly.");
        }
        if (message.value == "") {
          message.push("Please enter your inquiry.");
        }
        if (message.length > 0) {
          alert(message);
          return;
        }
        alert('OK');
      });
    };
  </script>
</body>

</html>