<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load file</title>
</head>

<body>
    <form class="form-upload" method="post" action="xuly.php" enctype="multipart/form-data">
        <input type="file" name="uploadfile" />
        <input type="submit" value="Upload" />
        <input type="reset" value="Huỷ" />
    </form>

    <div>
        <?php
        if (isset($_GET['msg'])) {
            if (isset($_GET['ten']) && isset($_GET['kichthuoc']) && isset($_GET['mime'])) {
                echo "File đã upload thành công!<br/>";
                echo "<b>Tên file: </b>" . $_GET['ten'] . "<br/>";
                echo "<b>Kích thước: </b>" . $_GET['kichthuoc'] . "<br/>";
                echo "<b>MIME: </b>" . $_GET['mime'] . "<br/>";
            } else
                echo "File upload không thành công!";
        }

        ?>
    </div>

    <div>
        <?php 
        if (isset($_GET['ten']) && isset($_GET['kichthuoc']) && isset($_GET['mime'])) {
            include_once dirname(__FILE__) . "\action.php";
        }
        ?>
    </div>

    <style>
        body {
            width: 100%;
            max-width: 1200px;
            margin: 0px auto;
            padding: 0px;
        }

        .form-upload {
            width: 1200px;
            padding: 10px;
            border: solid 1px #ccc;
            margin: 12px auto;
            display: flex;
        }

        input {
            min-width: 100px;
            padding: 4px;
            border: solid 1px #ccc;
            margin: 8px 12px;
        }

        input[type=file] {
            width: 478px;
            flex: 1;
        }

        input:hover {
            opacity: 0.8;
        }
    </style>

</body>

</html>