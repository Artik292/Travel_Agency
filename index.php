<?php

require 'vendor/autoload.php';
require 'connection.php';

$app = new \atk4\ui\App('Travel agency');
$app->initLayout('Admin');

require 'visual.php';

$app->layout->add(['Message','Hello ']);

$app->layout->add(['Message','Our company is best in the world']);

$form = $app->layout->add('Form');
$form->setModel(new Record($db));
$form->onSubmit(function($form) {
	$form->model->save();
	return $form->success('Record updated');
});
