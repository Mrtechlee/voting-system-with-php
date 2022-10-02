<?php
	require_once('db.php');

	header('Content-type: text/xml');
	echo '<Response>';

	$phone_number = $_REQUEST['From'];
	$team_number = (int) $_REQUEST['Body'];

	// If we've got good data, save the vote
	if ( (strlen($phone_number) >= 10) && ($team_number > 0) )
	{
		$db = new DB();

		// save_vote will check to see if the person has already voted
		$response = $db->save_vote($phone_number, $team_number);
	}
	else {
		// Otherwise, give the user an example of how to vote
		$response = 'Sorry, I didn\'t understand that. Text the team number to vote. For example, texting 1 will vote for Team 1.';
	}

	// Send an SMS back to the person that voted letting them know that their vote was saved, or that there was an error of some sort
	echo '<Sms>'.$response.'</Sms>';
	echo '</Response>';
?>
