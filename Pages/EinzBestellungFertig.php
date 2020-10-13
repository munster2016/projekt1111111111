<?php

session_start();

require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');
require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
require_once('F:\OSPanel\domains\projekt\Classes\MainEinzBestellungFertig.php');


if (!isset($_SESSION['userid'])) {
    session_destroy();
    die('<meta http-equiv="refresh" content="0; URL=Anmeldung.php">');
}

$repoFactory = new Factory();
$userRepos = $repoFactory->createUserRepository();


$_main = new MainEinzBestellungFertig($userRepos->getById($_SESSION['userid']));


$_phpPageRender = new PhpPageRenderer();

$_phpPageRender->renderContent($_main);