<?php

namespace app\models;

class indexModel{

	private static $messages = ['hello','greetings', 'olah senior'];

	public function getMessage(){
		$length = count(static::$messages);
		$length--;
		$rand = rand(0,$length);
		return static::$messages[$rand];
	}
}