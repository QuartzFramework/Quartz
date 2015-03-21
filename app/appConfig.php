<?php

/*
	This file contains the app used config for dependancy's, for default settings and config check the settings file
*/
/*
	Error handling
*/

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();







$app->add('loadTemplate',function(){
	$loader = new Twig_Loader_Filesystem('public/views/');
	return new Twig_Environment($loader);
});

$app->add('authentication',function(){

	// move this beautifull piece of shit to it's own repo :).
	class basicAuthenticationProvider extends \quartz\authentication\AuthenticationProvider {
		public function __construct() { }

		public function validate($input) {

			$username = $input['username'];
			$password = $input['password'];

			if ($username === 'matti' && parent::hash($password) === '1a43a304a70b9eb55a53791692d487f75196379de975d4a22e5141b31d9c3652eb6ccc279a4401cdf879301e7fc7525d831a9d70bff3ccfe600be4013b68971f') {
				return true;
			}
			return false;

		}
	}


	$auth = new quartz\authentication\Authentication(new basicAuthenticationProvider);
	if ( $auth->provider()->validate(['username' => 'matti','password' => 'wachtwoord']) ) {
		echo 'Jay je gegevens kloppen';
	} else {
		dd(array('Authentication error' => 'Login credentials did not match'));
	}
});


require_once(__DIR__.'/appRegister.php');


foreach ($appRegister['vendor'] as $key => $vendor):

	$$vendor = new $key;
	$$vendor->setStack($app->getStack());
	$app->setStack($$vendor->getStack());

endforeach;

