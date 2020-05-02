<?php

require_once "admin/model/Mprocat.php";
$procat = new Procat();
$listMainProcat = $procat->listMainChid(['1', '0']);

require_once "admin/model/Mmenu.php";
$menu = new Menu();
$listMainMenu = $menu->listMainchid(['1', '0']);

?>