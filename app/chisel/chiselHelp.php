<?php

namespace app\chisel;


class chiselHelp{

	private $cli;
	private $args;
	private $options;
	private $res;

	public function __construct($argv,$cli = false){
		$this->cli = $cli;
		$this->args = $argv;
		$this->handleHelpRequest();
	}

	private function loadResults($res){
		$file = __DIR__.'/help/'.$res.'.txt';
		if(!file_exists($file)):
			$file = __DIR__.'/help/main.txt';
		endif;
		$this->res = file_get_contents($file);
		return $this;
	}

	private function showResults($title){
		$this->cli->info("\n".'::: '.$title.' :::'."\n");
		$this->cli->silver($this->res);
		return $this;
	}

	private function handleHelpRequest(){

		if(isset($this->args[2])):
			$arg = $this->args[2];
		else:
			$arg = 'main';
		endif;
		$this->loadResults($arg)->showResults($arg);
	}

}