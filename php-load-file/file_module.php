<?php
function loadTextFile($fname)
{
    try {
        $handle = fopen($fname, "r+");
        $content = fread($handle, filesize($fname));
        fclose($handle);
        return $content;
    } catch (Exception $e) {
        return false;
    }
}

function saveTextFile($fname, $content)
{
    try {
        $handle = fopen($fname, "w+");
        fwrite($handle, $content);
        fclose($handle);
    } catch (Exception $e) {
        return false;
    }
}

function renameFile($location, $fname, $fnew)
{
    try {
        rename($location.$fname, $location.$fnew);    
        header("Location: ./?msg=done&ten=$fnew&kichthuoc=$size&mime=$mime");
    } catch (Exception $e) {
        return false;
    }
}
function deleteFile($fname)
{
    try {
        unlink($fname);
        header("Location:./");
    } catch (Exception $e) {
        return false;
    }
}
