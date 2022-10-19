<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
            <?php
            if ($index == 0)
                include_once "productlist.php";
            else
                include_once "detailproduct.php";
            ?>
        </div>
    </div>


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
    </style>
</body>

</html>