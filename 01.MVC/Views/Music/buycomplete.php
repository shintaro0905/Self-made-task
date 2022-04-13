<?php
session_start();
require_once(ROOT_PATH . 'Controllers/OrderController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$order = new OrderController();
if (!isset($_SESSION['data'])) {
    header('Location:buy.php');
    exit();
}
$order->upload($_SESSION['data']);
// session_destroy();


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buycomp</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>
<?php include('header.php'); ?>

<body>

  <div class="buycomp">
    <div class="cb">
      <h4>Buy Complete!!!!</h4>
    </div>

    <div class="contactbox3">
      <a>Thank you for your purchase.<br>
        We look forward to seeing you again.
      </a>

      <div class="complink">
        <div class="bt">
          <br>
          <h4><button type="submit"> <a href="index.php">Go To Mainpage.<br><br></a></button></h4>
        </div>
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
  </script>
</body>

</html>