<?php

namespace App;

require 'vendor/autoload.php';

$start   = new Application();
$view    = new HtmlView();
$counter = new HtmlParameterParser();

$start->run($view,$counter);