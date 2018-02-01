<?php

require 'vendor/autoload.php';

use \atk4\ui\Button;

session_start();

$layout = $app->layout;

/*$button = new Button();
$button->set('Log out');
$button->set(['primary'=>true]);
$button->set(['size big'=>true]);
$button->link('logout.php');
$app->add($button); */

$layout->leftMenu->addItem(['Main page','icon'=>'building'],['index']);

$layout->leftMenu->addItem(['Places','icon'=>'tree'],['places']);

$layout->leftMenu->addItem(['Admin','icon'=>'user circle'],['admin']);
