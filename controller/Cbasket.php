<?php

require_once "admin/model/Mproduct.php";
$pro = new Product();

require_once "admin/model/Mbasket.php";
$basket = new Basket();
switch ($action) {
    case 'list':
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            $user_id = $_SESSION['user_id'];
            $listBasket = $basket->listBasket($user_id);
        } else {
            header("Location: index.php?c=customer&a=login");
        }
        break;
    case 'delete':
        $id = $_GET['id'];
        $basket->deleteBasket($id);
        break;
    case 'add':
        $data['user_id'] = $_SESSION['user_id'];
        $data['pro_id'] = $_GET['pro_id'];
        $checkBasket = $basket->checkBasket([$data['user_id'], $data['pro_id']]);
        if (empty($checkBasket)) {
            $basket->addBasket($data);
        }

        header("Location:index.php?c=basket&a=list");
        break;
}

require_once "view/$controller/V$action.php";

?>