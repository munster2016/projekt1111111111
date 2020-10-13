<?php

session_start();

require_once('F:\OSPanel\domains\projekt\Classes\MainEinzBestellung.php');
require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Management\OrderManagement\SingleOrder.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$userRepository = $factory->createUserRepository();

$user = $userRepository->getById($_SESSION['userid']);

if(isset($_REQUEST['upload'])){

    $resultPreis =

    $order = new SingleOrder(

        $_SESSION['userid'],
        $_POST['supplierId'],
        $_POST['wish'],
        date("Y-m-d H:i:s"),
        $_POST['foodId']
    );

    $orderRepos = $factory->createOrderRepository();
    $storeSingleOrder = $orderRepos->storeOrder($order);
    header("Location: EinzBestellungFertig.php");
}



$main = new MainEinzBestellung($user);
$phpRender = new PhpPageRenderer();
$phpRender->renderContent($main);
