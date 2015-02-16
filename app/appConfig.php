<?php

/*
	This file contains the app used config for dependancy's, for default settings and config check the settings file
*/
/*
	Error handling
*/

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// add the 'smooth function to the stack' # note smooth is just a demo function, you realy won't need it;)
$app->add('smooth',function($var){return $var.' = smooth';});

$app->add('loadTemplate',function(){
	$loader = new Twig_Loader_Filesystem('public/views/');
	return new Twig_Environment($loader);
});
