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

            if (isset($_POST['name']) && isset($_POST['id'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $query = "update tb_category set name='$name', id='$id' where id='$id'";
                if (executeNonQuery($query))
                    echo "<div>Category updated successfully</div>";
                else
                    echo "<div>Something went wrong</div>";
            }
            ?>

            <form action="" method="post">
                <input type="text" name="name" value="<?php echo $row[1] ?>">
                <input type="hidden" name="id" value="<?php echo $row[0] ?>">
                <input type="submit" value="Save">
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