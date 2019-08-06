<?php

namespace App;

require 'vendor/autoload.php';

$start   = new Application();
$view    = new HtmlView();
$parameter = new HtmlParameterParser();

$start->run($view,$parameter);