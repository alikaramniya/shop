<?php

require_once "model/Mproduct.php";

$pro = new Product();
switch ($action) {
    case 'add':
        if ($_POST) {
            $data = $_POST['frm'];
            $pic1 = $_FILES['img1'];
            $pic2 = $_FILES['img2'];
            $pic3 = $_FILES['img3'];
            $arr = array(
                'img1' => $pic1,
                'img2' => $pic2,
                'img3' => $pic3
            );
            foreach ($arr as $key => $pic) {
                if (isset($pic['name'])) {
                    $dir = "public/img/admin/uploader/product/";
                    $data[$key] = $pro->uploadPic($pic, $dir);
                } else {
                    $data[$key] = '';
                }
            }
            $pro->addPro($data);
        }
        //list category
        $listSubCat = $pro->listSubCat(['1', '0']);
        break;
    case 'list':
        $listPro = $pro->listPro();
        if (isset($_GET['state'])) {
            $id = $_GET['id'];
            $data['status'] = '1';
            $pro->updateSubCat($data, $id);
            header("Location:index.php?c=product&a=list");
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        //delete file and folder
        $edit = $pro->showEdit($id);
        $arr = array(
            'img1' => $edit->img1,
            'img2' => $edit->img2,
            'img3' => $edit->img3
        );
        foreach ($arr as $img) {
            $pro->deleteFileFolder($img);
        }

        $pro->deletePro($id);
        header("Location:index.php?c=product&a=list");
        break;
    case 'edit':
        $id = $_GET['id'];
        $edit = $pro->showEdit($id);
        if ($_POST) {
            $data = $_POST['frm'];
            $pic1 = $_FILES['img1'];
            $pic2 = $_FILES['img2'];
            $pic3 = $_FILES['img3'];
            $arr = array(
                'img1' => $pic1,
                'img2' => $pic2,
                'img3' => $pic3
            );

            foreach ($arr as $key => $pic) {
                if ($pic['name']) {
                    //delete old file and folder
                    $pro->deleteFileFolder($edit->$key);
                    $dir = "public/img/admin/uploader/product/";
                    $data[$key] = $pro->uploadPic($pic, $dir);
                } else {
                    $data[$key] = $edit->$key;
                }
            }
            $pro->updatePro($data, $id);
            header("location:index.php?c=product&a=list");
        }
        //list category
        $listSubCat = $pro->listSubCat(['1', '0']);
        break;
}

require_once "view/$controller/V$action.php";

?>