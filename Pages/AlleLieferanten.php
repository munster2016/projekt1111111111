<?php

session_start();

require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
require_once('F:\OSPanel\domains\projekt\Classes\MainAlleLieferanten.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$supplierRepos = $factory->createSupplierRepository();
$userRepos = $factory->createUserRepository();



$suppliersArray = $supplierRepos->getAllSuppliers();
$user = $userRepos->getById($_SESSION['userid']);

$main = new MainAlleLieferanten($suppliersArray, $user);
$phpPageRenderer = new PhpPageRenderer();
$phpPageRenderer->renderContent($main);