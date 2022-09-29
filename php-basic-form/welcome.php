<?php
if (
    isset($_POST['name'])
    && isset($_POST['age'])
    && isset($_POST['gender'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['address'])
    && isset($_POST['info'])
) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adress = $_POST['address'];
    $info = $_POST['info'];
    $check = true;
} else
    header("Location:./");
?>

<body>
    <div>
        Welcome to Michat, <?php echo $name; ?>
    </div>
    <div>
        This is the infomation about you
        <br>
        Age: <?php echo $age; ?>
        <br>
        Gender: <?php echo $gender == 'male' ? 'Male' : 'Female'; ?>
        <br>
        Email: <?php echo $email; ?>
        <br>
        Password: <?php echo $password; ?>
        <br>
        Address: <?php
                    switch ($adress) {
                        case 'hanoi':
                            echo 'Hà Nội';
                            break;
                        case 'danang':
                            echo 'Đà Nẵng';
                            break;
                        case 'hochiminh':
                            echo 'Hồ Chí Minh';
                            break;
                        case 'cantho':
                            echo 'Cần Thơ';
                            break;
                        default:
                            break;
                    };
                    ?>
        <br>
        Info: <?php
                foreach ($info as $key => $value) {
                    if ($value == 'term')
                        echo 'I accept term of Michat' . "<br>";
                    elseif ($value == 'receipt-email')
                        echo 'I want to receipt email form Michat' . "<br>";
                } ?>
    </div>

    <style>
        body {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        div {
            display: flex;
            flex-direction: column;
        }
    </style>

</body>