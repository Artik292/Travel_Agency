<?php

require 'vendor/autoload.php';
require 'connecting.php';

$app = new \atk4\ui\App('Registration');
$app->initLayout('Admin');

require 'visual.php';

$layout = $app->layout;

$grid = $layout->add('CRUD');
$grid->setModel(new user($db));
