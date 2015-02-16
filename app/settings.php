<?php

/*

	/app/settings.php

*/

// Is the app in development or not
$dev = true;

// administrator mail
$adminMail = 'mvdweem@gmail.com';

// App name, this is not necesary but some people prefere to set it
define('AppName', '');

// Root dir
define('ROOT',__DIR__.'/../');

// Envoirment, when envoirment is set we'll overwrite the default envoirment ('Note: you cannot set dev to true and envoirment not to dev')
define('ENVOIRMENT', 'dev');

// Database

$database->host 	= 'localhost';
$database->username = 'root';
$database->password = '';
$database->database = 'Quartz';

