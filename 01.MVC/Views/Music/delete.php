<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$request = new ProductsController();
// if (!$_GET['id']) {
//   header('Location:contact.php');
//   exit();
// }
$request->delete($_GET['id']);
// session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>
<?php include('header.php'); ?>

<body>
  <div class="delete">
    <h4>Deleted Successfully.</h4>
    <div class="bt">
      <h4> <button type="submit" id=""><a href="index.php">To Mainpage Screen.</a></button></h4>
    </div>
  </div>
</body>
<?php include("footer.php") ?>

</html>