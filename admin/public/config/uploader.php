<?php

require_once "config.php";

class Uploader extends Config
{
    public final function uploadPic($pic, $dir)
    {
        $folder = 'folder-' . rand();
        if (!file_exists($dir . $folder)) {
            mkdir($dir . $folder);
            exit;
            $picname = $pic['name'];
            $arr = explode('.', $picname);
            $ext = end($arr);
            $new_name = 'pic-' . rand() . '.' . $ext;
            $from = $pic['tmp_name'];
            $to = $dir . $folder . '/' . $new_name;
            move_uploaded_file($from, $to);
            return $to;
        } else {
            $this->uploadPic($pic, $dir);
        }
    }
}

?>