<?php

namespace app\controllers;
use app\models\indexModel;

class indexController{


	public function getFriendlyReminder($name){
		//$model = new app\models\indexModel;
		return indexModel::getMessage(). ' ' . $name;

	}

}