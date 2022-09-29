<div>
    <?php
    include "file_module.php";
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case "Lưu":
                saveTextFile(dirname(__FILE__) . "/_files/". $_GET['ten'], $_POST['data']);
                break;
            case "Xoá";
                deleteFile(dirname(__FILE__) . "/_files/". $_GET['ten']);
                break;
            case "Đổi tên":
                renameFile(dirname(__FILE__) . "/_files/", $_GET['ten'], 
                $_POST['fname'] . "." . pathinfo(dirname(__FILE__) . "/_files/". $_GET['ten'])['extension']);
                break;
            default:
                break;
        }
    }
    ?>

    <form method="POST" action="">
        <input type="text" name="fname" placeholder="Nhập tên file" />
        <span>.<?php echo pathinfo(dirname(__FILE__) . "/_files/". $_GET['ten'])['extension'] ?></span>
        <br />

        <textarea name="data" style="width: 400px; height: 400px; ">
            <?php
            echo loadTextFile(dirname(__FILE__) . "/_files/". $_GET['ten']);
            ?>
        </textarea> <br />

        <input type="submit" name="action" value="Lưu" />
        <input type="submit" name="action" value="Xoá" />
        <input type="submit" name="action" value="Đổi tên" />
        <form>
</div>