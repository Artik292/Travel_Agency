<?php

require 'vendor/autoload.php';

$app = new \atk4\ui\App('Travel agency');
$app->initLayout('Admin');


//$n = $_Get($_SESSION['user_name'])

session_start();

//echo $_SESSION['user_name'];

$app->layout->add(['Message','Hello ' . $_SESSION['user_name']]);

$app->layout->add(['Message','Our company is best in the world']);

$layout = $app->layout;

if ($_SESSION['user_name'] == 'admin') {
  $layout->leftMenu->addItem(['Users','icon'=>'users'],['admin']);
}

$layout->leftMenu->addItem(['Places','icon'=>'tree'],['places']);
