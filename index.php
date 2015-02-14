<?php

require_once('app/bootstrap.php');
$app = new App;

$app->add('smooth',function($var){return $var.' = smooth';});

require_once('app/routes.php');
$app->run();
