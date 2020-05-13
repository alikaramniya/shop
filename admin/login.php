<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/admin/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/admin/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="public/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="public/css/admin/style.css" rel="stylesheet">
    <link href="public/css/admin/style-responsive.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
</head>

<body class="login-body">


<?php
require_once "public/config/uploader.php";
$action = 'login';
if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
    $action = 'cookie';
}
if (file_exists("controller/Cuser.php"))
    require_once "controller/Cuser.php";
?>


</body>
</html>
