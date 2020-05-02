<?php

require_once "model/Mmenu.php";

$menu = new Menu();
switch ($action) {
    case 'add':
        if ($_POST) {
            $data = $_POST['frm'];
            $menu->addMenu($data);
        }
        $list_chid = $menu->list_chid(['1', 0]);
        break;
    case 'list':
        if (isset($_GET['state'])) {
            $id = $_GET['id'];
            $data['status'] = '1';
            if ($_GET['state'] == 'ok')
                $data['status'] = '0';
            $menu->update_menu($data, $id);
            header("Location:index.php?c=menu&a=list");
        }
        $list_menu = $menu->list_menu();
        break;
    case 'delete':
        $id = $_GET['id'];
        $menu->delete_menu($id);
        header("Location: index.php?c=menu&a=list");
        break;
    case 'edit':
        $id = $_GET['id'];
        $edit = $menu->showEdit($id);
        if ($_POST) {
            $data = $_POST['frm'];
            $menu->update_menu($data, $id);
            header("Location: index.php?c=menu&a=list");
        }
        $list_chid = $menu->list_chid(['1', 0]);
        break;
}

require_once "view/$controller/V$action.php";

?>