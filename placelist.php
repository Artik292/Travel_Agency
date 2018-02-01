<?php

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Travel agency');
$app->initLayout('Admin');

require 'visual.php';

$place=new Place($db);
$place->load($app->stickyGet('id'));
$record= $place->ref('Record');
$record->setOrder('name');
$grid = $app->add('Grid');
$grid->setModel($record);
