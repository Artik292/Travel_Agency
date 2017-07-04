<?php

require 'vendor/autoload.php';
require 'connecting.php';

$app = new \atk4\ui\App('Places for traveling');
$app->initLayout('Admin');

require 'visual.php';

$grid = $layout->add('CRUD');
$grid->setModel(new place($db));
