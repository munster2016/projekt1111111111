<?php

session_start();

//require_once('F:\OSPanel\domains\projekt\Classes\MainLogin.php');
//require_once('F:\OSPanel\domains\projekt\Classes\PhpPageRenderer.php');
//require_once('F:\OSPanel\domains\projekt\Factory\Factory.php');

require_once('../Classes/MainLogin.php');
require_once('../Classes/PhpPageRenderer.php');
require_once('../Factory/Factory.php');



$factory = new Factory();
$userRepos = $factory->createUserRepository();

$errorMessage = null;

if (isset($_REQUEST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $user = $userRepos->getByName($name);

    /**
     * Controller, checking password from DB with password from post
     */
    if (!empty($user) && $password == $user->getPassword()) {

        $_SESSION['userid'] = $user->getId();
        header("Location: EinzBestellung.php");

    } else {
        $errorMessage = "<a style='color: red;'>*Name oder Passwort war ungültig</a><br>";
    }

}

$_main = new MainLogin($errorMessage);

$_phpPageRender = new PhpPageRenderer();

$_phpPageRender->renderContent($_main);