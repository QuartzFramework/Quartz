<?php

/**

	Register your components for usage, these will be autoloaded with the stack at that specific moment
	Reorder these to change stack priority

	// Quartz is build on the idea of passing trough values via a huge stack, this stack is transported
	// between objects, you can read edit manipulate or even remove the stack at the current time, but
	// previous objects won't be affected


**/

$appRegister = [];

$appRegister['vendor'] = [
	'\quartz\Routing\Router' => 'route',
];

