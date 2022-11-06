<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once "db_trifarm.php";
    $link = null;
    taoKetNoi($link);
    ?>

    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
        
            <?php include_once "content.php" ?>
        </div>

    </div>

    <?php dispose($link, $result); ?>

    <style>
        body {
            display: flex;
            /* align-items: center; */
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
        }

        .nav-side {
            width: 20%;
        }

        .content {
            flex: 1;
        }

        .btn-wraper {
            display: flex;
        }

        .btn {
            margin-right: 32px;
            display: block;
            text-decoration: none;
            padding: 12px 16px;
            color: white;
            background-color: rgb(66, 133, 244);
        }
    </style>
</body>

</html>