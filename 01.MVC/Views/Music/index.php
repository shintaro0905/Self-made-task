<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}
$user = $_SESSION['user'];

$product = new ProductsController();
if ($user['role'] == 1) {
    $params = $product->index();
} elseif ($user['role'] == 0) {
    $params = $product->index();
}

// var_dump($user);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="/mod/LKBNX/v2.23/demo/cn/cn.php"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>
<div id=header>
  <?php include("header.php") ?>
</div>
<script>
  $("#send").on("click", function(submit) {}
</script>

<body>



  <main>
    <div class="text_area1">
      <div class="text1">
        <a>Welcom To Music City.</a>
      </div>
    </div>
  </main>

  <div class="text_area2">
    <div class="text2">
      <a>List Display.</a>
    </div>
  </div>

  <div class="paging">
    <h4><?php
    for ($i = 0; $i <= $params['pages']; $i++) {
        if (isset($_GET['page']) && $_GET['page'] == $i) {
            echo $i + 1;
        } else {
            echo "<a href='?page=" . $i . "'>" . ($i + 1) . "</a>";
        }
    }
    ?></h4>
  </div>


  <div class="side_menu">
    <div class="box2">
      <div class="admin">

        <h4><?php if ($user['role'] == 1) : ?>
            <a>Admin User</a>
            <?php endif; ?>
        </h4>

        <h4><?php if ($user['role'] == 0) : ?>

            <a>General User</a>
            <?php endif; ?>
        </h4>
        <h4><?php if ($user['role'] == 1) : ?>
            <li> <a href="product.php">new Product</a></li>
            <?php endif; ?>
      </div>
      <ul>
        <li><a href="mypage.php">Mypage.</a></li>
        <li><a href="logout.php">Logout.</a></li>
      </ul>

    </div>
  </div>



  <div class="product">

    <div class="photo">

      <h4><img src="music/img/music1.jpg" alt=""></h4>

    </div>
    <table id="list">
      <div class="productmenu">
        <div class="pro">
          <a>product.</a>
        </div>
        <div class="pro">
          <a>category.</a>
        </div>
        <div class="pro">
          <a>creater.</a>
        </div>
        <div class="pro">
          <a>price.</a>
        </div>
        <div class="pro">
          <a>overview.</a>
        </div>
        <!--   <th>product.</th>
            <th>category.</th>
            <th>creater.</th>
            <th>price.</th>
            <th>overview.</th>-->
      </div>
      <div class="productmenu2">

        <?php foreach ($params['product'] as $column) : ?>

          <!-- <button type="submit" inputname="submit" class="fav">Favo</button>-->
          <div class="like-button" data-id="<?php echo $row['id']; ?>" data-like="<?php echo $row['good']; ?>">
          </div>
          <div class="pro">
            <a1> <?php echo $column['product'] ?></a1>
          </div>

          <div class="pro">
            <a2> <?php echo $column['category'] ?></a2>
          </div>

          <div class="pro">
            <a3> <?php echo $column['creater'] ?></a3>

          </div>
          <div class="pro">
            <a4><?php echo $column['price'] ?></a4>
          </div>
          <div class="pro">
            <a5><?php echo $column['overview'] ?></a5>
          </div>
          <div class="line">
          </div>
          <br>
          <div class="submitbt">
            <h4>
              <a href="purchse.php?id=<?php echo $column['id'] ?>">Buy.</a>
            </h4>
            <br>
            <?php if ($user['role'] == 1) : ?>
              <h4> <a href="productedit.php?id=<?php echo $column['id'] ?>">Edit.</a></h4>
              <br>
              <h4> <a href="delete.php?id=<?php echo $column['id'] ?>">Delete.</a>
              </h4>
              <br>
            <?php endif; ?>
        <?php endforeach; ?>
          </div>
      </div>
    </table>

  </div>
  <br>
  <div class="paging">
    <h4> <?php
    for ($i = 0; $i <= $params['pages']; $i++) {
        if (isset($_GET['page']) && $_GET['page'] == $i) {
              echo $i + 1;
        } else {
              echo "<a href='?page=" . $i . "'>" . ($i + 1) . "</a>";
        }
    }
    ?>
    </h4>
  </div>




  <!-- <?php include("calendar.php") ?> -->


</body>

<?php include("footer.php") ?>



</html>