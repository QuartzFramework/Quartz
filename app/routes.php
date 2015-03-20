<?php

$app->get('/', 'indexController', 'indexController');
$app->get('/hi/{name}', 'indexController', 'indexController');



$app->get('/a/{test}',function($results, $recourses){
	return array_merge($recourses,$results);
});

$app->setRoute('test')->get('test',function($results, $recourses){
	return $recourses['authentication']();
});

if(!$app->matches()):
	$app->setRoute('404')->get('404',function($results, $recourses){
		return $recourses['loadTemplate']()->render('404.tpl', array());
	});
endif;