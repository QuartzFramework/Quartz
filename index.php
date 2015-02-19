<?php
	// require the bootstrap file when you stumbled apon the index file,
	// this file does actualy nothing except loading the site for you.
	// This is faster then an 301 redirect
	include ('app/bootstrap.php');




	/*
		Writiing logic fo hexagonal piping


		pipes are accesable via command bus constructionp pipes, thise pipes are called via it's owns
		Command in / out puts.

		Each in and output is an out/input

		this means everything is omnidirexionaly targetable by eachother, making a call needs an in put a command bus
		and a  command.

		commands are piped and shifted trough each other,

	*/
?>