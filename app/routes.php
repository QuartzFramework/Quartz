<?php


$app->get('/',function($results, $recourses){

	$controller = new app\controllers\indexController();
	return $recourses['loadTemplate']()
		->render('index.tpl',
				 array(
						'page' => 'home',
						'framework' => $recourses['smooth']('framework'),
						'friendly' => $controller::getFriendlyReminder('Matti')
					));
});



$app->get('/a/{test}',function($results, $recourses){
	return array_merge($recourses,$results);
});


if(!$app->matches()):
	$app->setRoute('404')->get('404',function($results, $recourses){
		return $recourses['loadTemplate']()->render('404.tpl', array());
	});
endif;