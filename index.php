<?php

namespace App;

require 'vendor/autoload.php';

$start = new Application();
$view = new HtmlView();
$view->htmlView($start->run());

