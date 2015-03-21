<?php

$route->get('/', 'indexController', 'indexController');
$route->get('/hi/{name}', 'indexController', 'indexController');



$route->get('/a/{test}',function($results, $recourses){
	return array_merge($recourses,$results);
});

$route->setRoute('test')->get('test',function($results, $recourses){
	return $recourses['authentication']();
});

if(!$route->matches()):
	$route->setRoute('404')->get('404',function($results, $recourses){
		return $recourses['loadTemplate']()->render('404.tpl', array());
	});
endif;