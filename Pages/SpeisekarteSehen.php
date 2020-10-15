<?php

session_start();

//require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
//require_once('F:\OSPanel\domains\projekt\Classes\MainAlleLieferanten.php');
//require_once('F:\OSPanel\domains\projekt\Classes\MainSpeisekarteSehen.php');

require_once('../Classes/PhpPageRenderer.php');
require_once('../Factory/Factory.php');
require_once('../Classes/MainAlleLieferanten.php');
require_once('../Classes/MainSpeisekarteSehen.php');



if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$supplierId = $_GET['supplierId'];

$factory = new Factory();
$reposMenu = $factory->createMenuRepository();

$menu = $reposMenu->getMenuBySupplierId($supplierId);


$main = new MainSpeisekarteSehen($menu, $supplierId);
$phpPageRenderer = new PhpPageRenderer();
$phpPageRenderer->renderContent($main);




