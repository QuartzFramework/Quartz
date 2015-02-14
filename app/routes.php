<?php

$app->get('/',function(){
	$loader = new Twig_Loader_Filesystem('public/views/');
	$twig = new Twig_Environment($loader);
	return $twig->render('index.tpl', array('page' => 'home'));
});

