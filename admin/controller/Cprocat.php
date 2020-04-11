<?php

require_once "model/Mprocat.php";

$procat = new Procat();
switch ($action) {
    case 'add':
        if ($_POST) {
            $data = $_POST['frm'];
            $procat->addProcat($data);
        }
        //Select the main groups
        $listMainChid = $procat->listMainChid(['1', '0']);
        $total = count($listMainChid);
        break;
    case 'list':
        $listProcat = $procat->listProcat();
        $total = count($listProcat);
        if (isset($_GET['state'])) {
            $id = $_GET['id'];
            $data['status'] = '1';
            if ($_GET['state'] == 'ok')
                $data['status'] = '0';
            $procat->updateProcat($data, $id);
            header("Location:index.php?c=procat&a=list");
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        $procat->deleteProcat($id);
        header("Location:index.php?c=procat&a=list");
        break;
    case 'edit':

        break;
}

require_once "view/$controller/V$action.php";

?>