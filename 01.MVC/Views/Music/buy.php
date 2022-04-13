<?php
session_start();
require_once(ROOT_PATH . 'Controllers/OrderController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$order = new OrderController();
$params = $order->index();


$errors = [];
$fullname = "";
$paymethod = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //以下バリデーション
    $fullname = filter_input(INPUT_POST, 'fullname');
    $paymethod = filter_input(INPUT_POST, 'paymethod');
    $email = filter_input(INPUT_POST, 'email');

    if (empty($fullname) || mb_strlen($fullname) > 10) {
        $errors['fullname'] =  '<font color = "red">Please enter your name.</font> ';
    }

    if (empty($email) || !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9])+([a-zA-Z0-9._-])+([a-zA-Z0-9])+\z/", ($email))) {
        $errors['email'] =  '<font color = "red">Please enter your email address correctly.</font> ';
    }

  // 名前の空欄チェック
    if (empty($paymethod) || mb_strlen($paymethod) > 11) {
        $errors['paymethod'] =  '<font color = "red">Please enter your card information.</font> ';
    }



    if (empty($errors)) {
        $_SESSION['data'] = $_POST;
        header('Location: ./buyconfirm.php');
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
  <title>Buy</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>
<?php include('header.php'); ?>

<body>

  <!--入力画面-->
  <form action="#" method="get" id="reload">
    <input type="hidden" name="reload" value="true">
  </form>


  <div class="buy">
    <div class="cb">
      <h>Buy Product!!!!</h>
    </div>
    <div class="ctext1">
      <h11>Please enter the following items.</h11>
    </div>


    <form action="" method="POST">


      <div class="contacttitle">
                <h4> <label>Fullname<span>*</span></label></h4>
        <?php if (isset($errors['fullname'])) : ?>
         <h4> <div class="vali"><?php echo $errors['fullname']; ?></div></h4>
        <?php endif; ?>
      </div>
      </h4>

      <div class="elementwrap">
        <h4><input type="text" name="fullname" id="fullname" placeholder="山田太郎" value="<?php if (!empty($_SESSION['fullname'])) {
                                                                                                  echo $_SESSION['fullname'];
                                                                                       } ?>"><br>

       <br>
        <h4> <label>Email<span>*</span></label></h4>
        <?php if (isset($errors['email'])) : ?>
          <h4><div class="vali"><?php echo $errors['email']; ?></div></h4>
        <?php endif; ?>
      </div>
      </h4>

      <div class="elementwrap">
        <h4><input type="text" name="email" id="email" placeholder="test@test.cp.jp" value="<?php if (!empty($_SESSION['email'])) {
                                                                                                  echo $_SESSION['email'];
                                                                                            } ?>"><br></h4>

        <br>
        <h4> <label>Credit Number<span>*</span></label></h4>
        <?php if (isset($errors['paymethod'])) : ?>
         <h4> <div class="vali"><?php echo $errors['paymethod']; ?></div> </h4>
        <?php endif; ?>
      </div>
      </h4>

      <div class="elementwrap">
        <h4><input type="text" name="paymethod" id="paymethod" placeholder="0123456789" value="<?php if (!empty($_SESSION['paymethod'])) {
                                                                                                  echo $_SESSION['paymethod'];
                                                                                               } ?>"><br>
        </h4>
      </div>
      <br>
      <div class="bt">
        <h4> <input type="submit" name="confirm" id="btnSubmit" value="Send" /></h4>
      <div> <h4> <button type="submit" inputname="submit"><a href="index.php" class="return-btn">Back</a></button></h4>
      </div>
    </form>
  </div>



  </tr>

  </table>

  <div id="footer">
    <?php include("footer.php") ?>
  </div>

</body>

</html>