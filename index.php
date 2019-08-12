<?php

namespace App;

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');

$start     = new Application();
$view      = new HtmlView();
$parameter = new HtmlParameterParser();

$start->run($view,$parameter);