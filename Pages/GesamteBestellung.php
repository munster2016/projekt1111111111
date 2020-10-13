<?php

session_start();

require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Classes\MainLieferantAuswahlFuerHeute.php');
require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
require_once('F:\OSPanel\domains\projekt\Classes\MainGesamteBestellung.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$userRepos = $factory->createUserRepository();

if (isset($_REQUEST['upload'])) {
   // $supplierRepos->storeCurrentlySupplier($_POST['supplierId']);

    // echo '<meta http-equiv="refresh" content="0; url=http://vm71nb05.mainz.interexa.de/user/aadamchuk/bestellsystem/Pages/LieferantFuerHeute.php" />';


}

$orderRepos = $factory->createOrderRepository();
$fullorder = $orderRepos->getFullOrder();

var_dump($fullorder);


$main = new MainGesamteBestellung($fullorder);
$phpPageRenderer= new PhpPageRenderer();

//$phpPageRenderer->renderContent($main);
