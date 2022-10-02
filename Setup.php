<?php
	// Sets up the database. Only needs to be run once. After that you can delete this file.
	require_once('db.php');

	$db = new DB();

	// Create the database tables
	$db->init();

	// Add some teams
	$db->add_team('Team 1');
	$db->add_team('Team 2');
	$db->add_team('Team 3');

	echo 'Database created and teams added';
?>
