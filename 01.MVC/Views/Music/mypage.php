<?php
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$product = new ProductsController();
$params = $product->index();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mypage</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>
<div id=header>
  <?php include("header.php") ?>
</div>

<body>
  <main>
    <div class="text_area1">
      <div class="text1">
        <h4> <a>Notice List.</a></h4>
        <ul>
          <h4>・The service started on 2022/04/06.</h4>
          <h4>・We look forward to your opinions and requests.</h4>
        </ul>
      </div>
    </div>
  </main>
  <div class="side_menu">
    <div class="box2">
      <ul>
        <li><a href="index.php">Mainpage.</a></li>
        <li><a href="logout.php">Logout.</a></li>
      </ul>
    </div>
  </div>

  <?php include("calendar.php") ?>

</body>
<div id=footer>
  <?php include("footer.php") ?>
</div>

</html>