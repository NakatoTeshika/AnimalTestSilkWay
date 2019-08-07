<?php

namespace App;

require 'vendor/autoload.php';

$start     = new Application();
$view      = new CliView();
$parameter = new CliParameterParser();

$start->run($view, $parameter);
