<?php

namespace app\chisel;


class chiselServe{

	private $cli; # this should not be here ;)
	private $args;
	private $options;

	public function __construct($argv,$cli = false){
		$this->cli = $cli;
		$this->args = $argv;
		$this->parseOptions();
		$this->startServer();
	}

	private function startServer($port = 9000){

		if(isset($this->options['p'])):
			$port = $this->options['p'];
		endif;
		$this->cli->info('Starting server on http://localhost:'.$port);
		$this->cli->info('To close the server [ctrl] + [c]');
		
		shell_exec('php -S localhost:'.$port.' app/chisel/serve/router.php');
		
		if(isset($this->options['o'])):
			$this->cli->info('Opening your project');
			exec('open http://localhost:'.$port);
		endif;

		

	}

	private function parseOptions(){
		$args = ($this->args);


		// $option name, $regex
		$options = [
			'o' => '/(-o)/',
			'p' => '/-p=(\d*)/',

		];
		$results = [];

		foreach($args as $arg):
			foreach($options as $key => $option):
				if(preg_match($option, $arg, $matches)):
					$results[$key] = end($matches);
				endif;
			endforeach;
		endforeach;
		$this->options = $results;
	}

}
