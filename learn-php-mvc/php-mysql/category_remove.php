<?php require_once("db_module.php"); ?>
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
            $result = executeQuery("select * from tb_category where id=" . $_GET['category']);
            $row = mysqli_fetch_row($result);

            if (isset($_POST['qa']))
                if ($_POST['qa'] == 'yes') {
                    $id = $_GET['category'];
                    $query = "delete from tb_category where id='$id'";
                    if (executeNonQuery($query))
                        echo "<div>Category delete successfully</div>";
                    else
                        echo "<div>Something went wrong</div>";
                }
            ?>

            <form action="" method="post">
                <label for="qa">You want to delete the <?php echo $row[1] ?> category ?</label>
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