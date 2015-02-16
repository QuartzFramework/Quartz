<?php
/*
	Quicky little and dirty routing for the framework, work has to be done here
*/
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    include __DIR__.'/../../bootstrap.php';
}