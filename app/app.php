<?php
/**
 * Lots of work has to be done here, refactor and cleaning up is quite important
 * @author Matti van de Weem <mvdweem@gmail.com>
 */

class quartz {

	// The Route that will be used to match paths against.
	protected static $route;

	// current data stack, this will be rendered out
	protected $stack;

	// holds the settings
	protected $settings = [
		'return' => 'default', # default/json/ {Your custom return types}
		#.. more settings here

	];


	/**
	 * Constructs the basic Routing
	 * @param String [$route = false] The basic routing path that will be used,
	 * If not filled in: it will be generated form $_SERVER vars
	 * @return void
	 */
	public function __construct($route = false){
		// you defined your own route, we'll just set it
		if($route):
			static::$route = $route;
		else:
			$route = str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['REQUEST_URI']);
		endif;
		static::$route = $route;
	}



	/**
	 * [[Description]]
	 * @param  [[Type]] [$settings = false] [[Description]]
	 * @return [[Type]] [[Description]]
	 */
	public function run($stack = false, $settings = false){
		if($settings):
			$this->settings = array_merge($this->settings,$settings);
		endif;
		if($stack):
			$this->stack = $stack;
		endif;

		if(empty($this->stack['prints'])):
			return;
		endif;

		$stack = [];
		foreach($this->stack['prints'] as $print):
			$stack[] = $print;
		endforeach;

		if(strtolower($this->settings['return']) === 'json'):
			$stack = json_encode($stack);
		endif;
		return $stack;
	}

	/**
	 * Adds new recourse to recourse stack
	 * @param [[Type]] $alias    [[Description]]
	 * @param [[Type]] $recourse [[Description]]
	 */
	public function add($alias, $recourse){
		$this->stack['resources'][$alias] = $recourse;
	}

	public function getStack(){
		return $this->stack;
	}
	public function setStack($stack){
		$this->stack = $stack;
	}

	/**
	 * Render the current view
	 * todo: Move this function oustside routing
	 * @param mixed $contents contents to be rendered
	 */
	public function renderView($contents){
		if(is_array($contents)):
			foreach($contents as $content):
				if(is_string($content)):
					echo $content;
				else:
					print_r($content);
				endif;
			endforeach;
			return;
		endif;
		echo $contents;
		return;
	}

}
