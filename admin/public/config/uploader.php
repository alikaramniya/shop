<?php

require_once "config.php";

class Uploader extends Config
{
    public final function uploadPic($pic, $dir)
    {
        $folder = 'folder-' . rand();
        if (!file_exists($dir . $folder)) {
            if ($pic['error'] === 0) {
                if ($pic['size'] <= 5000000) {
                    if (!mkdir($directory = $dir . $folder) && !is_dir($directory)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was no created', $directory));
                    }
                    $picname = $pic['name'];
                    $arr = explode('.', $picname);
                    $ext = end($arr);
                    $new_name = 'pic-' . rand() . '.' . $ext;
                    $from = $pic['tmp_name'];
                    $to = $dir . $folder . '/' . $new_name;
                    move_uploaded_file($from, $to);
                    return $to;
                } else {
					exit('حجم فایل انتخابی بیش از جد مجاز است');
				}
            }
        }
    }

    public function showFolder($pic)
    {
        $arr = explode('/', $pic);
        $total = count($arr);
        unset($arr[$total - 1]);
        $folder = implode('/', $arr);
        return $folder;
    }

    public function deleteFileFolder($pic)
    {
        $folder = $this->showFolder($pic);
        unlink($pic);
        rmdir($folder);
    }
}

?>