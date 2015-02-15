<?php

// The bootstrapping file.
require_once('app/bootstrap.php');

// link to the path where your routes are defined, they can be define here, but to keep it clean they are moved.
require_once('app/routes.php');

// run the app, also wrap it in a render view (this will make shure multiple outputs will be put on to the screen)
$app->renderView($app->run(['return' => 'default']));
