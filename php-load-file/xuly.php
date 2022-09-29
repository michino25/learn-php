<?php

$uploadFolder = "./_files/";
$filename = "";

include_once "upload_module.php";

$result_upload = uploadFileTo($uploadFolder, $filename);

if ($result_upload) {
    $size = filesize($uploadFolder . $filename);
    $mime = mime_content_type($uploadFolder . $filename);
    header("Location: ./?msg=done&ten=$filename&kichthuoc=$size&mime=$mime");
} else {
    header("Location:./?msg=error");
}
