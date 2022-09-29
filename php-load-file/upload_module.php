<?php
// uploadfile lên thư mục _files và giữ nguyên tên file
function uploadFileTo ($uploaddir, &$oldfilename) {
    $filetemp = $_FILES['uploadfile']['tmp_name'];
    $oldfilename = $_FILES['uploadfile']['name'];
    return move_uploaded_file($filetemp, $uploaddir.$oldfilename);
}

// uploadfile lên thư mục _files và đổi tên thành newfilename
function uploadRenameFile ($uploaddir, $newfilename) {
    $filetemp = $_FILES['uploadfile']['tmp_name'];
    return move_uploaded_file($filetemp, $uploaddir.$newfilename);
}