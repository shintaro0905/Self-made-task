<?php //phpcs:disable Generic.Files.LineLength.TooLong
session_start();
require_once(ROOT_PATH . 'Controllers/ProductsController.php');
// if (empty($_SERVER["HTTP_REFERER"])) {
//     header('Location: index.php');
// }
$request = new ProductsController();
$params = $request->userGood($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Town Blog</title>
    <link rel="icon" href="/img/logo.png">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <div class="header">
            <div class="logo "><img src="/img/logo.png" alt="Logo"></div>
            <h3>Town Blog</h3>
            <div class="go_nav">
                <div class="menu"><a href="search.php">Search</a></div>
            </div>
        </div>
    </header>
    <main class="profile">
        <h2>Favorite</h2>
        <?php if (!($params == false)) : ?>
            <table>
                <?php foreach ($params["good"] as $arr) : ?>
                    <tr>
                        <td><?php
                            $created_at = htmlspecialchars($arr['created_at'], ENT_QUOTES);
                            echo $created_at ?></td>
                        <td><a href="view_fav.php?id=<?php echo $arr['b_id'] ?>"><?php
                                                                                    $title = htmlspecialchars($arr['title'], ENT_QUOTES);
                                                                                    echo $title ?></a></td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php endif; ?>
    </main>
</body>

</html>