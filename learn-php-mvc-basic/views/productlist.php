<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Product List</h1>

    <?php
    foreach ($products as $product) {
        echo "
        <div>
            <h2>
                <a href='index.php?id=" . $product->getId() . "'>" . $product->getName() . "</a>
                <img style='width: 150px; object-fit: contain' src=" . $product->getImg() . ">
            </h2>
        </div>";
    }
    ?>

</body>

</html>