<?php

require_once "admin/model/Mprocat.php";
$procat = new Procat();
$listMainProcat = $procat->listMainChid(['1', '0']);
$totalProcat = count($listMainProcat);

?>