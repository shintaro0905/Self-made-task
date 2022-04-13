<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ContactsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$contacts = new ContactsController();
$params = $contacts->index();


$errors = [];
$fullname = "";
$katakana = "";
$phone = "";
$email = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //以下バリデーション
    $fullname = filter_input(INPUT_POST, 'fullname');
    $katakana = filter_input(INPUT_POST, 'katakana');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $message = filter_input(INPUT_POST, 'message');


  // 名前の空欄チェック
    if (empty($fullname) || mb_strlen($fullname) > 50) {
        $errors['fullname'] =  '<font color = "red">Please enter your name.</font> ';
    }


    if (empty($katakana) || mb_strlen($katakana) > 50) {
        $errors['katakana'] = '<font color = "red">Please enter the fuligana.</font> ';
    }

    if (empty($phone) || mb_strlen($phone) > 100) {
        $errors['phone'] = '<font color = "red">Please enter your phone number.</font> ';
    }

    if (empty($phone)) {
    } elseif (!preg_match("/\A[0-9]+\z/", ($phone))) {
        $errors['phone'] =  '<font color = "red">Please enter the phone number using only the numbers 0-9.</font> ';
    }

    if (empty($email) || !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9])+([a-zA-Z0-9._-])+([a-zA-Z0-9])+\z/", ($email))) {
        $errors['email'] =  '<font color = "red">Please enter your email address correctly.</font> ';
    }

    if (empty($message)) {
        $errors['message'] = '<font color = "red">Please enter your inquiry.</font> ';
    }


    if (empty($errors)) {
        $_SESSION['data'] = $_POST;
        header('Location: ./confirm.php');
        exit();
    }
}



if (isset($_GET['reload'])) {
  // unset($_SESSION['fullname']); //消したいセッションデータ
  // unset($_SESSION['katakana']); //消したいセッションデータ
  // unset($_SESSION['phone']); //消したいセッションデータ
  // unset($_SESSION['email']); //消したいセッションデータ
  // unset($_SESSION['message']); //消したいセッションデータ
    $_SESSION = [];
}
// session_destroy();

?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>

<body>
  <?php include('header.php'); ?>
  <!--入力画面-->
  <form action="#" method="get" id="reload">
    <input type="hidden" name="reload" value="true">
  </form>


  <div class="contact">
    <div class="cb">
      <h4>Inquiry</h4>
    </div>

    <h4>Please fill in the following items and press the send button.</h4>

    <h4>We will get back to you with regard to the matter you sent.<br>
      Please note that it may take some time before you contact us.<br>
      <span>*</span>Is a required item.
    </h4>


    <form action="" method="POST">


      <div class="contact">

        <label>Fullname<span>*</span></label><br>
        <h4> <?php if (isset($errors['fullname'])) : ?>
            <div class="vali"><?php echo $errors['fullname']; ?></div>
          <?php endif; ?>
        </h4>

      </div>
      <div class="elementwrap">
        <h4> <input type="text" name="fullname" id="fullname" placeholder="山田太郎" value="<?php if (!empty($_SESSION['fullname'])) {
                                                                                          echo $_SESSION['fullname'];
                                                                                        } ?>"><br>
      </div>
      </h4>

      <div class="contact">
        <label>Furigana<span>*</span></label><br>
        <h4><?php if (isset($errors['katakana'])) : ?>
            <div class="vali"><?php echo $errors['katakana']; ?></div>
          <?php endif; ?>
        </h4>
      </div>

      <div class=" elementwrap">
        <h4><input type="text" name="katakana" id="katakana" placeholder="ヤマダタロウ" value="<?php if (!empty($_SESSION['katakana'])) {
                                                                                            echo $_SESSION['katakana'];
                                                                                         } ?>"><br>
      </div>
      </h4>

      <div class="contact">
        <label>Tel<span>*</span></label><br>
        <h4> <?php if (isset($errors['phone'])) : ?>
            <div class="vali"><?php echo $errors['phone']; ?></div>
          <?php endif; ?>
      </div>
      </h4>
      <div class="contact">
        <h4> <input type="text" name="phone" id="phone" placeholder="09012345678" value="<?php if (!empty($_SESSION['phone'])) {
                                                                                            echo $_SESSION['phone'];
                                                                                         } ?>"><br>
      </div>
      </h4>

      <div class="contact">
        <label>Email<span>*</span></label><br>
        <h4> <?php if (isset($errors['email'])) : ?>
            <div class="vali"><?php echo $errors['email']; ?></div>
          <?php endif; ?>
      </div>
      </h4>

      <div class="contant">
        <h4> <input type="text" name="email" id="email" placeholder="test@test.cp.jp" value="<?php if (!empty($_SESSION['email'])) {
                                                                                                echo $_SESSION['email'];
                                                                                             } ?>"> <br>
      </div>
      </h4>

      <div class="contact">
        <label>Please fill in the inquiry<span>*</span></label><br>
        <h4> <?php if (isset($errors['message'])) : ?>
            <div class="vali"><?php echo $errors['message']; ?></div>
          <?php endif; ?>
      </div>
      </h4>

      <div class="contant">
        <h4> <textarea cols="40" rows="20" name="message" id="message" placeholder="Please enter your inquiry." value="<?php if (isset($_SESSION['message'])) {
                                                                                                                            echo $_SESSION['message'];
                                                                                                                         } ?>"></textarea><br>
          <!--cols=列(横幅指定)、rows=行(高さ)-->
      </div>
      </h4>
      <div class="contactbt">
        <br>
        <h4> <input type="submit" name="confirm" id="btnSubmit" value="Send" />
      </div>
      </h4>
       <h4> <button type="submit" inputname="submit"><a href="index.php" class="return-btn">Back</a></button></h4>
    </form>
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
          message.push("The name has not been entered.");
        }
        if (katakana.value == "") {
          message.push("The reading is not entered.");
        }
        if (phone.value == "") {
          message.push("The phone number is incorrect.");
        }
        if (email.value == "") {
          message.push("You have not entered your email address.");
        } else if (!reg.test(email.value)) {
          message.push("E-mail address format is invalid.");
        }
        if (message.value == "") {
          message.push("The text has not been entered.");
        }
        if (message.length > 0) {
          alert(message);
          return;
        }
        alert('Input check OK');
      });
    };


    if (window.performance.navigation.type === 1) {
      $('#reload').submit();
    }
  </script>
</body>

</html>