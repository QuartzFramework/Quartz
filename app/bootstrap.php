<?php

/*

 put some autoloading here please

*/

// boot up the app
require_once('app.php');
$app = new App;

// require everything from composer here
require_once(__DIR__.'/../vendor/autoload.php');

// load in the app config
require_once('appConfig.php');
