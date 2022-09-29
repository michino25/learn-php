<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <?php include_once "content.php" ?>
        </div>
    </div>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-items: center;
            align-items: center;
        }

        .content {
            flex: 1;
        }
    </style>

</body>
</html>