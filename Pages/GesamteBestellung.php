<?php

session_start();

//require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
//require_once('F:\OSPanel\domains\projekt\Classes\MainLieferantAuswahlFuerHeute.php');
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
//require_once('F:\OSPanel\domains\projekt\Classes\MainGesamteBestellung.php');

require_once('../Classes/PhpPageRenderer.php');
require_once('../Classes/MainLieferantAuswahlFuerHeute.php');
require_once('../Factory/Factory.php');
require_once('../Classes/MainGesamteBestellung.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$userRepos = $factory->createUserRepository();


$orderRepos = $factory->createOrderRepository();
$fullorder = $orderRepos->getFullOrder();


$main = new MainGesamteBestellung($fullorder);
$phpPageRenderer= new PhpPageRenderer();

$phpPageRenderer->renderContent($main);
