<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("db_module.php");
    $link = NULL;
    taoKetNoi($link);
    ?>
    <div id="container">
        <div id="banner"></div>
        <điv id="menu"><?php include_once("task.php"); ?>
    </div>
    <div id="menu">
        <div>
            <?php include_once("menu.php"); ?>
        </div>
        <div>
            <?php include_once("cart.php"); ?>
        </div>
    </div>
    <div id="content">
        <?php include_once("content_tk.php"); ?>
    </div>
    </div>
    <?php
    giaiPhongBoNho($link, $result);
    ?>
</body>

</html>