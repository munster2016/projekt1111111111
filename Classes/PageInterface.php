<?php

//require_once('F:\OSPanel\domains\projekt\Classes\RenderInterface.php');

require_once('../Classes/RenderInterface.php');

interface PageInterface extends RenderInterface
{
    public function isMenu() :bool;

    public function getTitel() :string;
}