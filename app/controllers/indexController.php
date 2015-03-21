<?php

/**

	Demo aplication show Welcome screen with friendly message


**/
namespace app\controllers;


class indexController extends Controller{


	public function __construct(){

	}
	public function indexController($results, $recourses){
		$friendly ='';
		if (isset($results['name']) && $results['name'] != ''):
			$friendly = self::getFriendlyReminder($results['name']);
		endif;
		return $recourses['loadTemplate']()->render('index.tpl',
				 array(
						'page' => 'home',
						'framework' => 'Quartz',
						'friendly' => $friendly
					));
	}

	public function getFriendlyReminder($name){
		return \app\models\indexModel::getMessage(). ' ' . str_replace('%20',' ',$name);
	}

}