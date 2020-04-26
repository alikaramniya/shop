<?php

require_once "admin/model/Mproduct.php";

$pro = new Product();
switch ($action) {
    case 'list':
		$subCat = 'no';
		$listProDefault = $pro->listPro();
		if (isset($_GET['id'])) {
			$subCat = 'yes';
			$id = $_GET['id'];
			$subCat = $pro->showSubCat($id);
			$mainCat = $pro->showMainChid($subCat->chid);
			$listProDefault = $pro->listProSubCat($id);
		}
        break;
    case 'details':
        $id = $_GET['id'];
        $details = $pro->showEdit($id);
		$subCat = $pro->showSubCat($details->cat_id);
		$mainCat = $pro->showMainChid($subCat->chid);
        $listProDefault = $pro->listProSubCat($details->cat_id);
		break;
}

require_once "view/$controller/V$action.php";

?>