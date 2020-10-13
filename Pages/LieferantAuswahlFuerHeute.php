<?php

session_start();

require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Classes\MainLieferantAuswahlFuerHeute.php');
require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$supplierRepos = $factory->createSupplierRepository();
$userRepos = $factory->createUserRepository();

if (isset($_REQUEST['upload'])) {
    $supplierRepos->storeCurrentlySupplier($_POST['supplierId']);

    // echo '<meta http-equiv="refresh" content="0; url=http://vm71nb05.mainz.interexa.de/user/aadamchuk/bestellsystem/Pages/LieferantFuerHeute.php" />';


}

$suppliersArray = $supplierRepos->getAllSuppliers();
$user = $userRepos->getById($_SESSION['userid']);

$main = new MainLieferantAuswahlFuerHeute($suppliersArray, $user);
$phpPageRenderer= new PhpPageRenderer();

$phpPageRenderer->renderContent($main);

