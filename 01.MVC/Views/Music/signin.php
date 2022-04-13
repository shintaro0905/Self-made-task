<?php

session_start();
require_once(ROOT_PATH . 'Controllers/UserController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$user = new UserController();
$params = $user->index();


$errors = [];
$fullname = "";
$email = "";
$password = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (empty($fullname) || mb_strlen($fullname) > 50) {
        $errors['fullname'] =  '<font color = "red">Please enter your name.</font> ';
    }


    if (empty($email) || !preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9])+([a-zA-Z0-9._-])+([a-zA-Z0-9])+\z/", ($email))) {
        $errors['email'] =  '<font color = "red">Please enter your email address correctly.</font> ';
    } //メールアドレス正規表現用。提出時はこちらに変更。



    if (empty($password) || !preg_match("/\A[a-z\d]{4,100}+\z/i", ($password))) {
        $errors['password'] = '<font color = "red">Please enter the password correctly.</font> ';
    }

    if (empty($errors)) {
        $_SESSION['data'] = $_POST;
        header('Location: ./signin_complete.php');
        exit();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signin</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>
<div id=header>
  <?php include("header.php") ?>
</div>

<body>

  <div class="signin">
    <h4>Please enter the following to sign in.</h4>
    <form action="" method="POST">

      <h4>Fullname</h4>
      <h4> <input type="text" name="fullname" id="fullname" value=""> <br></h4>

      <h4> <?php if (isset($errors['fullname'])) : ?>
            <?php echo $errors['fullname']; ?>
           <?php endif; ?>
      </h4>


      <h4>Email</h4>
      <h4> <input type="text" name="email" id="email" value=""> <br></h4>

      <h4> <?php if (isset($errors['email'])) : ?>
            <?php echo $errors['email']; ?>
           <?php endif; ?>
      </h4>

      <h4>Password</h4>

      <h4> <input type="text" name="password" id="password" value=""> <br></h4>
       <h4> <?php if (isset($errors['password'])) : ?>
            <?php echo $errors['password']; ?>
            <?php endif; ?>
      </h4>

      <h4> <button type="submit" id="login">sign up</button></h4>

    </form>
  </div>
</body>

</form>
<?php include("footerlog.php") ?>

</html>