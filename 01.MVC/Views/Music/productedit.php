<?php
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
if (empty($_SERVER["HTTP_REFERER"])) {
    header('Location: login.php');
}


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
        $_SESSION['update'] = $_POST;
        header('Location: ./producteditcomp.php');
        exit();
    }
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
  <title>ProductEdit</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="style.js" defer></script>

</head>

<html>
</head>
<?php include('header.php'); ?>

<body>
  <div class="productedit">
    <form action="" method="POST" id="form">

      <h4><span class="required">*</span>Is a required item.</h4>
      <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

      </h4>

      <h4>Product<span>*</span>
      </h4>
      <h4> <?php if (isset($errors['product'])) : ?>
          <div class="vali"><?php echo $errors['product']; ?></div>
           <?php endif; ?>
        <input type="text" name="product" value="<?php if (!empty($result['product'])) {
                                                    echo htmlspecialchars($result['product']);
                                                 } ?>">
      </h4>


      <h4>Category<span>*</span>
      </h4>
      <h4> <?php if (isset($errors['category'])) : ?>
          <div class="vali"><?php echo $errors['category']; ?></div>
           <?php endif; ?>
        <input type="text" name="category" value="<?php if (!empty($result['category'])) {
                                                    echo htmlspecialchars($result['category']);
                                                  } ?>">
      </h4>

      <h4>Creater<span>*</span>
      </h4>
      <h4> <?php if (isset($errors['creater'])) : ?>
          <div class="vali"><?php echo $errors['creater']; ?></div>
           <?php endif; ?>
        <input type="text" name="creater" value="<?php if (!empty($result['creater'])) {
                                                    echo htmlspecialchars($result['creater']);
                                                 } ?>">
      </h4>


      <h4>Price<span>*</span>
      </h4>
      <h4> <?php if (isset($errors['price'])) : ?>
          <div class="vali"><?php echo $errors['price']; ?></div>
           <?php endif; ?>
        <input type="text" name="price" value="<?php if (!empty($result['price'])) {
                                                  echo htmlspecialchars($result['price']);
                                               } ?>">
      </h4>

      <h4>Overview<span>*</span>
      </h4>
      <h4> <?php if (isset($errors['overview'])) : ?>
          <div class="vali"><?php echo $errors['overview']; ?></div>
           <?php endif; ?>
        <input type="text" name="overview" value="<?php if (!empty($result['overview'])) {
                                                    echo htmlspecialchars($result['overview']);
                                                  } ?>">
      </h4>

      <br>
      <h4> <input type="submit" value="Edit"></h4>

    </form>
</body>
<?php include("footer.php") ?>

</html>