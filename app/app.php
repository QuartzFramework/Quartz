<?php
/**
 * @author Matti van de Weem <mvdweem@gmail.com>
 */

class App {

	// The Route that will be used to match paths against.
	private static $route;
	
	// current data stack, this will be rendered out
	private $stack;
	
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
			// check if the page is located from index.php or via htacces
			if (strpos($_SERVER['REQUEST_URI'],'index.php') !== false):
				$route = str_replace($_SERVER['SCRIPT_NAME'],'',$_SERVER['REQUEST_URI']);
			else:
				$route = '/'.str_replace(str_replace('index.php','',$_SERVER['SCRIPT_NAME']),'',$_SERVER['REQUEST_URI']);
			endif;
		endif;
		static::$route = $route;
	}
	
	/**
	 * Matches Protocol, and path
	 * @param  String $protocol The protocol that should've been used
	 * @param  String $path     The path that should be matched against the $route
	 * @param  Function $function The function that should be executed when there is a match
	 * @return boolean  Will return false on no match, will return true and run your funciton on match
	 */
	public function match($protocol, $path, $function = false){
		
		if($protocol === $_SERVER['REQUEST_METHOD']):
		
			$params = (explode('/',static::$route));
			array_shift($params);
		
			$reqs = (explode('/',$path));
			array_shift($reqs);
		
			// break down, when the param count does not match
			if(count($reqs) != count($params)): return false; endif;

			$regex = '/{(.*)}/';
			$vars = array();
			
			foreach($reqs as $key => $req):
				preg_match($regex,$req,$matches);
				if(isset($matches[1]) && !empty($matches[1]) && isset($params[$key]) && $params[$key] != ''):
					$vars[$matches[1]] = $params[$key];
				elseif(!isset($params[$key]) || $req != $params[$key]):
					return false;
				else:
					// not variable
				endif;
			endforeach;
		
			// run the given function 
			if($function):
				$this->stack .= $function($vars);
			endif;
			
			// return true, you made it!
			return true;
		endif;
		// nop protocol miss match
		return false;
	}
	
	/**
	 * run $this->match with an 'GET' protocol
	 * @param  String $path               The string that will be matched
	 * @param  Function [$function = false] The function that will be executed on succesfull match
	 * @return boolean  returns match response
	 */
	public function get($path, $function = false){
		if($this->match('GET',$path,$function)): return true; endif;
		return false;
	}
	
	public function run(){
		if(is_array($this->stack)):
			echo'<pre>';
			print_r($this->stack);
			echo'</pre>';
		else:
			echo $this->stack;
		endif;
		exit;
		
	}

}
