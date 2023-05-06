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
            require_once("../db_module.php");
            $result = executeQuery("SELECT id, fullname, email from tb_user");
            while ($rows = mysqli_fetch_assoc($result))
                echo "<option value=" . $rows["id"] . ">" . $rows["fullname"] . "</option>";
            ?>
        </select>
    </form>
    <br>
    <div id="txtHint"><b>Person info will be listed here...</b></div>
    <script>
        async function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                document.getElementById("txtHint").innerHTML =
                    await ajaxQuery("GET", "getuser.php?id=" + str)
            };
        }

        function ajaxQuery(method, reqLink) {
            return new Promise(function(resolve, reject) {
                const objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.onreadystatechange = function() {
                    if (objXMLHttpRequest.readyState === 4) {
                        if (objXMLHttpRequest.status == 200) {
                            resolve(objXMLHttpRequest.responseText);
                        } else {
                            reject('Error Code: ' + objXMLHttpRequest.status + ' Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }
                objXMLHttpRequest.open(method, reqLink);
                objXMLHttpRequest.send();
            });
        }
    </script>
</body>

</html>