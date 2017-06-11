<?php

require 'vendor/autoload.php';
require 'connecting.php';

$app = new \atk4\ui\App('Places for traveling');
$app->initLayout('admin');

require 'visual.php';
