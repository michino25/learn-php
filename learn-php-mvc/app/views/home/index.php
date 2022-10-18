<?php
while($row = mysqli_fetch_array($data["Mang"])){
    echo "<h2><a href='./detail/".$row["id"]."'>" . 
    $row["name"] . 
    "</a></h2>";
}
?>