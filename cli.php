<?php

namespace App;

require 'vendor/autoload.php';

$start   = new Application();
$view    = new CliView();
$counter = new CliCounter();

$start->run($view, $counter);

