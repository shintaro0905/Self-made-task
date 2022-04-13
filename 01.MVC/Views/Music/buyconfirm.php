<?php
session_start();

if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
if (!isset($_SESSION['data'])) {
    header('Location:buy.php');
    exit();
}


$buy = $_SESSION['data'];



?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BUyconf</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>
<?php include('header.php'); ?>

<body>

  <!--入力画面-->


  <div class="buyconf">
    <div class="cb">
      <h>Purchase information</h>
    </div>

    <div class="contactbox2">
      <a>Please check the following contents and click the send button.<br>
        Press Back to correct the content.</a>
    </div>

    <form action="buycomplete.php" method="POST">
  <div class="buyconf2">
        <h4> <label>Fullname</label></h4>
        <br>
        <div class="line"></div>
        <br>
        <?php echo htmlspecialchars($buy['fullname']); ?><br>
      </div>

        <div class="buyconf2">
        <h4> <label>email</label></h4>
        <br>
        <div class="line"></div>
        <br>
        <?php echo htmlspecialchars($buy['email']); ?><br>
      </div>


      <div class="buyconf2">
        <h4> <label>Credit Number</label></h4>
        <br>
        <div class="line"></div>
        <br>
        <?php echo htmlspecialchars($buy['paymethod']); ?><br>
      </div>


      <div class="bt">

        <br>
        <h4> <button type="submit" inputname="submit">Send</button></h4>
        <br>
        <h4><button type="submit"><a href="buy.php" class="return-btn">Back</a></button></h4>
      </div>

  </div>


  <div id="footer">
    <?php include("footer.php") ?>
  </div>

</body>

</html>