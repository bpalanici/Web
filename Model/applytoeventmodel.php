<?php
	require_once('databaseConn.php');
	function applyToEvent($userGmail, $eventName, $eventGroup, $eventdiff, $eventDate) {
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('INSERT INTO events (usergmail, eventname, eventgroup, eventdiff, eventDate) Values (?, ?, ?, ?, ?)')) {
	    	$stmt->bind_param("sssss", $userGmail, $eventName, $eventGroup, $eventdiff, $eventDate);
	    	$stmt->execute();
			$stmt->close();
		}
		else return 'Some db Error, try again 3';

		return 'ok';
	}
	

?>