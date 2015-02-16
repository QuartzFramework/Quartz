<?php

namespace app\controllers;
use app\models\indexModel;

class indexController{


	public function getFriendlyReminder($name){
		return indexModel::getMessage(). ' ' . $name;
	}

}