<?php

/*
	Error hanlding
*/

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// add the 'smooth function to the stack'
$app->add('smooth',function($var){return $var.' = smooth';});

$app->add('loadTemplate',function(){
	$loader = new Twig_Loader_Filesystem('public/views/');
	return new Twig_Environment($loader);
});


