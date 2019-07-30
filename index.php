<?php

namespace App;

require 'vendor/autoload.php';

$start   = new Application();
$view    = new HtmlView();
$counter = new HtmlCounter();

$start->run($view,$counter);