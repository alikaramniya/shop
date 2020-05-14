<?php

//procat
require_once "admin/model/Mprocat.php";
$procat = new Procat();
$listMainProcat = $procat->listMainChid(['1', '0']);

//product
require_once "admin/model/Mproduct.php";
$pro = new Product();
$listPro = $pro->listPro();

//menu
require_once "admin/model/Mmenu.php";
$menu = new Menu();
$listMainMenu = $menu->listMainchid(['1', '0']);

//basket
require_once "admin//model/Mbasket.php";
$basket = new Basket();
if (isset($_SESSION['user_id'])) {
    $listBasket = $basket->listBasket($_SESSION['user_id']);
}



?>