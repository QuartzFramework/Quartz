<?php

namespace app\controllers;


class indexController extends Controller{


	public function __construct(){

	}
	public function indexController($results, $recourses){


		return $recourses['loadTemplate']()->render('index.tpl',
				 array(
						'page' => 'home',
						'framework' => 'Quartz',
						'friendly' => \app\controllers\indexController::getFriendlyReminder('Matti van de Weem')
					));
	}

	public function getFriendlyReminder($name){
		return \app\models\indexModel::getMessage(). ' ' . $name;
	}

}