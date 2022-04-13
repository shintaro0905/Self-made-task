<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ContactsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$contacts = new ContactsController();
if (!isset($_SESSION['data'])) {
    header('Location:contact.php');
    exit();
}
$contacts->upload($_SESSION['data']);
// session_destroy();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complete</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<body>


  <?php include('header.php'); ?>
  <div class="complete">
    <div class="cb">
      <h>Inquiry</h>
    </div>


    <a>Thank you for your inquiry.<br>
      We will get back to you with regard to the matter you sent.<br>
      Please note that it may take some time before you contact us.<br><br>
    </a>
    <div class="bt">
      <button type="submit"> <a href="index.php">Go To Mainpage!!!!<br><br></a></button>

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
  </script>
</body>

</html>