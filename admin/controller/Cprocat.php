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
        
        break;
    case 'delete':

        break;
    case 'edit':

        break;
}

require_once "view/$controller/V$action.php";

?>