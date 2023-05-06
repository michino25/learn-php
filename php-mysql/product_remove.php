<?php require_once("../db_module.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <div class="container">
        <div class="nav-side">
            <?php include_once "menu.php" ?>
        </div>

        <div class="content">
            <?php
            $result = executeQuery("select * from tb_product where id=" . $_GET['id_product']);
            $row = mysqli_fetch_row($result);

            if (isset($_POST['qa']))
                if ($_POST['qa'] == 'yes') {
                    $id = $_GET['id_product'];
                    $query = "delete from tb_product where id='$id'";
                    if (executeNonQuery($query))
                        echo "<div>Product delete successfully</div>";
                    else
                        echo "<div>Something went wrong</div>";
                }
            ?>

            <form action="" method="post">
                <label for="qa">You want to delete product <?php echo $row[1] ?> ?</label>
                <br>
                <input type="radio" id="qa" name="qa" value="no"> <span>No</span>
                <input type="radio" name="qa" value="yes"> <span>Yes</span>
                <br>
                <input type="submit" value="Submit">
            </form>

        </div>
    </div>

    <style>
        body {
            display: flex;
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