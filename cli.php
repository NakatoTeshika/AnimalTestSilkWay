<?php

namespace App;

require 'vendor/autoload.php';
define('ROOT', __DIR__ . '/');

$start     = new Application();
$view      = new CliView();
$parameter = new CliParameterParser();

$start->run($view, $parameter);
