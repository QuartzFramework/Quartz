<?php

// The bootstrapping file.
require_once('app/bootstrap.php');
// link to the path where your routes are defined, they can be define here, but to keep it clean they are moved.
require_once('app/routes.php');

// run the app
echo $app->run(['return' => 'default'])[0];
