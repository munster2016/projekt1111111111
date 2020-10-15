<?php

session_start();

//require_once('F:\OSPanel\domains\projekt\Classes\MainEinzBestellung.php');
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
//require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
//require_once('F:\OSPanel\domains\projekt\Management\OrderManagement\SingleOrder.php');

require_once('../Classes/MainEinzBestellung.php');
require_once('../Factory/Factory.php');
require_once('../Classes/PhpPageRenderer.php');
require_once('../Management/OrderManagement/SingleOrder.php');

if (!isset($_SESSION['userid'])) {
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$factory = new Factory();
$userRepository = $factory->createUserRepository();

$user = $userRepository->getById($_SESSION['userid']);

$error = null;
if(isset($_REQUEST['upload']))
    {
    if(isset($_POST['foodId'])) {

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

    }else
        $error = 'Du hast gar nicht gewählt!';

    }
$main = new MainEinzBestellung($user, $error);
$phpRender = new PhpPageRenderer();
$phpRender->renderContent($main);
