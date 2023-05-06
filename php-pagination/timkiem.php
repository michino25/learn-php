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
    require_once("../db_module.php");
    ?>
    <div id="container">
        <div id="banner"></div>
        <?php require_once("task.php"); ?>
    </div>

    <div id="content">
        <?php include_once("content_tk.php"); ?>
    </div>
    </div>
</body>

</html>