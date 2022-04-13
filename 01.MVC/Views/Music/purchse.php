<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');

if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$prod = new ProductsController();
if (empty($_POST) || !empty($_SESSION['data'])) {
    $result = $prod->getEdit($_GET['id']);
} else {
    $result = $prod->getEdit($_POST['id']);
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
  <title>Purchse</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>
<?php include("header.php") ?>

<body>

  <div id="purch">

    <form action="" method="POST" id="purch" class="pur">
      <a>Confirm purchase Information</a>


      <input type="hidden" name="id" value="<?php echo $result['id']; ?>">


      <h4>Product<span>*</span>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <?php if (isset($errors['product'])) : ?>
        <div class="vali"><?php echo $errors['product']; ?></div>
      <?php endif; ?>
      <?php if (!empty($result['product'])) {
            echo htmlspecialchars($result['product']);
      } ?>
      <br>
      <br>
      <div class="line"></div>
      <br>
      <h4>Category<span>*</span>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <?php if (isset($errors['category'])) : ?>
        <div class="vali"><?php echo $errors['category']; ?></div>
      <?php endif; ?>
      <?php if (!empty($result['category'])) {
            echo htmlspecialchars($result['category']);
      } ?>
      <br>
      <br>
      <div class="line"></div>
      <br>
      <h4>Creater<span>*</span>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <?php if (isset($errors['creater'])) : ?>
        <div class="vali"><?php echo $errors['creater']; ?></div>
      <?php endif; ?>
      <?php if (!empty($result['creater'])) {
            echo htmlspecialchars($result['creater']);
      } ?>
      <br>
      <br>
      <div class="line"></div>
      <br>

      <h4>Price<span>*</span>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <?php if (isset($errors['price'])) : ?>
        <div class="vali"><?php echo $errors['price']; ?></div>
      <?php endif; ?>
      <?php if (!empty($result['price'])) {
            echo htmlspecialchars($result['price']);
      } ?>
      <br>
      <br>
      <div class="line"></div>
      <br>

      <h4>Overview<span>*</span>
      </h4>
      <br>
      <div class="line"></div>
      <br>
      <?php if (isset($errors['overview'])) : ?>
        <div class="vali"><?php echo $errors['overview']; ?></div>
      <?php endif; ?>
      <?php if (!empty($result['overview'])) {
            echo htmlspecialchars($result['overview']);
      } ?>
      <br>
      <br>
      <div class="line"></div>
      <br>
      <br>
      <div class=buybtm>
        <h4><button type="submit" inputname="submit"><a href="buy.php" color="white">Go To Buy!!!!</button></h4>
       <div> <h4> <button type="submit" inputname="submit"><a href="index.php" class="return-btn">Back</a></button></h4>
        </li>
      </div>
    </form>
  </div>
</body>
<?php include("footer.php") ?>

</html>