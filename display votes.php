<?php
	require_once('db.php');

	$db = new DB();

	// Grab all the teams (and their vote counts) from the database
	$teams = $db->get_teams();

	echo '<ul>';

	// Loop through each team and display how many votes they got
	foreach ($teams as $team)
	{
		echo '<li>'.$team['name'].': '.$team['votes'].' votes</li>';
	}

	echo '</ul>';
?>
