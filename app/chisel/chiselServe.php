<?php

namespace app\chisel;

class chiselServe{

	private $cli;

	public function __construct($cli = false){
		$this->cli = $cli;
		$this->startServer();
	}

	private function startServer($port = 9000){
		$this->cli->info('Starting server on http://localhost:'.$port);
		shell_exec('php -S localhost:'.$port.' app/chisel/serve/router.php');
	}

}
