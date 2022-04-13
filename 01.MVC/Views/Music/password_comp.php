<?php
session_start();
require_once(ROOT_PATH . 'Controllers/UserController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: password.php');
}
$users = $_SESSION['data'];
$request = new UserController();
$result = $request->changePassword($users['email'], $users['password']);
if ($result = false) {
    header('Location: login.php');
    return;
}
?>
<!DOCTYPE html>
<html>
<div id=header>
  <?php include("header.php") ?>
</div>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PasswordChange</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<body>
  <div class="passcomp">
    <h4>Password Change Complete.</h4>
    <br>
    <h4><button type="submit" id=""><a href="login.php">To Login Screen.</a></button></h4>
  </div>
</body>
<?php include("footerlog.php") ?>
</html>