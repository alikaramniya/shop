<?php

require_once "admin/model/Mproduct.php";

$pro = new Product();
switch ($action) {
    case 'list':
        $listProDefault = $pro->listPro();
        break;
    case 'details':
        $id = $_GET['id'];
        $details = $pro->showEdit($id);
        break;
}

require_once "view/$controller/V$action.php";

?>