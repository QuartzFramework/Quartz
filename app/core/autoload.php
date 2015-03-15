<?php

function dd () {echo'<pre>';var_dump(func_get_args());die;}

spl_autoload_register(function ($className) {
 	$className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	$last = ltrim(str_replace('../app','',array_pop(explode('/app',$fileName))),'/');
    require $last;
});