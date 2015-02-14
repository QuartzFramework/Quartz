<?php

/*

 put some autoloading here please

*/
spl_autoload_register(function ($className) {
 	$className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	$last = ltrim(str_replace('app','',array_pop(explode('/app',$fileName))),'/');
    require $last;
});

// boot up the app
require_once('app.php');
$app = new App;

// require everything from composer here
require_once(__DIR__.'/../vendor/autoload.php');

// load in the app config
require_once('appConfig.php');
