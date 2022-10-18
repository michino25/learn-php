<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        <select name="users" onchange="showUser(this.value)">
            <?php
            require_once("db_module.php");
            $result = executeQuery("SELECT id, fullname, email from tb_user");
            while ($rows = mysqli_fetch_assoc($result))
                echo "<option value=" . $rows["id"] . ">" . $rows["fullname"] . "</option>";
            ?>
        </select>
    </form>
    <br>
    <div id="txtHint"><b>Person info will be listed here...</b></div>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    };
                };
                xmlhttp.open("GET", "getuser.php?id=" + str, true);
                xmlhttp.send();
            };
        }
    </script>
</body>

</html>