<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- POST -->
    <form action="welcome.php" method="post">
        <p class="title">Sign Up</p>

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name">
        </div>

        <div>
            <label for="age">Age</label>
            <input type="number" name="age" id="age" placeholder="Your Age" min="12" max="100">
        </div>

        <div>
            <label>Gender</label>
            <div>
                <input type="radio" name="gender" id="male" value="male">
                <label style="margin-left: 8px;" for="male">Male</label>
            </div>
            <div style="margin-left: 16px;">
                <input type="radio" name="gender" id="female" value="female"> 
                <label style="margin-left: 8px;" for="female">Female</label>
            </div>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Your Email">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Your Password">
        </div>

        <div>
            <label for="repassword">Address</label>
            <select name="address" id="address">
                <option value="" disabled selected hidden>--Select your option--</option>
                <option value="hanoi">Hà Nội</option>
                <option value="danang">Đà Nẵng</option>
                <option value="hochiminh">Hồ Chí Minh</option>
                <option value="cantho">Cần Thơ</option>
            </select>

        </div>

        <div>
            <input class="checkbox-input" type="checkbox" name="info[]" id="term" value="term">
            <label class="checkbox-label" for="term">I accept term of Michat</label>
        </div>

        <div>
            <input class="checkbox-input" type="checkbox" name="info[]" id="receipt-email" value="receipt-email">
            <label class="checkbox-label" for="receipt-email">I want to receipt email form Michat</label>
        </div>

        <div class="control">
            <input class="btn" type="submit" value="Sign Up"></input>
            <input class="btn" type="reset" value="Clear"></input>
        </div>
    </form>

    <style>
        body {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form div {
            margin: 8px 0;
            display: flex;
            align-items: center;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
        }

        form label {
            width: 100px;
        }

        form .checkbox-label {
            width: auto;
            margin-left: 8px;
        }

        form .checkbox-input {
            flex: none;
        }

        form select,
        form input {
            flex: 1;
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
        }

        form .control {
            margin: 8px -8px;
        }

        form .btn {
            padding: 8px 16px;
            border: none;
            background: black;
            color: white;
            font-size: 16px;
            margin: 0 8px;
        }

        form .btn:hover {
            opacity: 0.8;
        }
    </style>
</body>

</html>