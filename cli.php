<?php

namespace App;

require 'vendor/autoload.php';
$start = new Application();
$view = new CliView();
$view->cliView($start->run());