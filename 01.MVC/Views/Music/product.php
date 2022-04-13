<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$prod = new ProductsController();
$params = $prod->index();


$errors = [];
$product = "";
$category = "";
$creater = "";
$price = "";
$overview = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //以下バリデーション
    $product = filter_input(INPUT_POST, 'product');
    $category = filter_input(INPUT_POST, 'category');
    $creater = filter_input(INPUT_POST, 'creater');
    $price = filter_input(INPUT_POST, 'price');
    $overview = filter_input(INPUT_POST, 'overview');


  // 名前の空欄チェック
    if (empty($product) || mb_strlen($product) > 50) {
        $errors['product'] =  '<font color = "red">Please enter the product name.</font> ';
    }


    if (empty($category) || mb_strlen($category) > 50) {
        $errors['category'] = '<font color = "red">Please enter a category.</font> ';
    }

    if (empty($creater) || mb_strlen($creater) > 50) {
        $errors['creater'] = '<font color = "red">Please enter the creator name.</font> ';
    }

    if (empty($price) || mb_strlen($price) > 50) {
        $errors['price'] = '<font color = "red">Please enter the amount.</font> ';
    }

    if (empty($overview) || mb_strlen($overview) > 100) {
        $errors['overview'] = '<font color = "red">Please enter an overview.</font> ';
    }



    if (empty($errors)) {
        $_SESSION['data'] = $_POST;
        header('Location: ./productconf.php');
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
  <title>Product</title>
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


  <div class="products">
    <div class="cb">
      <h>Product Upload</h>
    </div>


    <form action="" method="POST">


      <div class="products">

        <h4><label>Product<span>*</span></label><br></h4>
        <h4><?php if (isset($errors['product'])) : ?>
            <div class="vali"><?php echo $errors['product']; ?></div>
            <?php endif; ?>
        </h4>
      </div>
      <div class="elementwrap">
        <h4><input type="text" name="product" id="product" placeholder="" value="<?php if (!empty($_SESSION['product'])) {
                                                                                    echo $_SESSION['product'];
                                                                                 } ?>"><br></h4>
      </div>

      <div class="products">
        <h4> <label>Category<span>*</span></label><br></h4>
        <h4><?php if (isset($errors['category'])) : ?>
            <div class="vali"><?php echo $errors['category']; ?></div>
            <?php endif; ?>
        </h4>
      </div>
      <div class=" elementwrap">
        <h4> <input type="text" name="category" id="category" placeholder="" value="<?php if (!empty($_SESSION['category'])) {
                                                                                      echo $_SESSION['category'];
                                                                                    } ?>"><br></h4>
      </div>
      <div class="products">
        <h4> <label>Creater<span>*</span></label><br></h4>
        <h4><?php if (isset($errors['creater'])) : ?>
            <div class="vali"><?php echo $errors['creater']; ?></div>
            <?php endif; ?>
        </h4>
      </div>
      <div class="elementwrap">
        <h4> <input type="text" name="creater" id="creater" placeholder="" value="<?php if (!empty($_SESSION['creater'])) {
                                                                                    echo $_SESSION['creater'];
                                                                                  } ?>"><br></h4>
      </div>

      <div class="products">
        <h4><label>Price<span>*</span></label><br></h4>
        <h4> <?php if (isset($errors['price'])) : ?>
            <div class="vali"><?php echo $errors['price']; ?></div>
             <?php endif; ?>
        </h4>
      </div>

      <div class="elementwrap">
        <h4><input type="text" name="price" id="price" placeholder="" value="<?php if (!empty($_SESSION['price'])) {
                                                                                echo $_SESSION['price'];
                                                                             } ?>"> <br></h4>
        <br>
      </div>

      <div class="products">
        <h4><label>Overview<span>*</span></label><br></h4>
        <h4> <?php if (isset($errors['overview'])) : ?>
            <div class="vali"><?php echo $errors['overview']; ?></div>
             <?php endif; ?>
        </h4>
      </div>


      <div class="elementwrap">
             <h4><textarea cols="40" rows="20" name="overview" id="overview" placeholder="" value="<?php if (isset($_SESSION['overview'])) {
                                                                                                          echo $_SESSION['overview'];
                                                                                                      } ?>"></textarea><br>
        <!--cols=列(横幅指定)、rows=行(高さ)-->
      </div>

      <div class="contacts">
        <br>
        <h4><input type="submit" name="confirm" id="btnSubmit" value="Send" /></h4>
      </div> <h4> <button type="submit" inputname="submit"><a href="index.php" class="return-btn">Back</a></button></h4>
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


    if (window.performance.navigation.type === 1) {
      $('#reload').submit();
    }
  </script>
</body>

</html>