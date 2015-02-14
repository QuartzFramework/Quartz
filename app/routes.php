<?php


$app->get('/',function($results, $recourses){
	//include('controllers/indexController.php');
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
	return $recourses;
});

