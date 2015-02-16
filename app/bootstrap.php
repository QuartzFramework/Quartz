<?php

/*

 put some autoloading here please

*/


// global definization
$database = new stdClass;

// boot up the app
require_once('core/autoload.php');
require_once('settings.php');
require_once('app.php');
$app = new App;

// require everything from composer here
require_once(__DIR__.'/../vendor/autoload.php');

// load in the app config
require_once('appConfig.php');

// link to the path where your routes are defined, they can be define here, but to keep it clean they are moved.
require_once('routes.php');

// run the app, also wrap it in a render view (this will make shure multiple outputs will be put on to the screen)
$app->renderView($app->run(['return' => 'default']));
