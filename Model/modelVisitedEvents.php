<?php

	require_once('databaseConn.php');
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	
	function getVisitedMeetup() {
		$result = '';
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('SELECT eventname, eventgroup, eventdiff, eventdate FROM events
			where usergmail = ? and eventgroup <> \'codeforces\'' )) {
			
			$stmt->bind_param("s", $_SESSION['userGmail']);
		    $stmt->execute();
		    $stmt->bind_result($evname, $evgroup, $eddiff, $evdate);
		    while ($stmt->fetch()) {
			    	$result .= '<div class="card"><div class=flexInsideCard><a class="card-title">
		                '. $evdate . '</br>' . $evgroup . '</br></br>' . $evname. '</br></br>Difficulty : ' . $eddiff . '
		          	</a></div></div>';
		    }
			$stmt->close();
		}
		else return 'Some db Error, try again';
		return $result;
	}

	function getVisitedCf() {
		$result = '';
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('SELECT eventname, eventgroup, eventdiff, eventdate FROM events
			where usergmail = ? and eventgroup = \'codeforces\'' )) {
			
			$stmt->bind_param("s", $_SESSION['userGmail']);
		    $stmt->execute();
		    $stmt->bind_result($evname, $evgroup, $eddiff, $evdate);
		    while ($stmt->fetch()) {
			    	$result .= '<div class="card"><div class=flexInsideCard><a class="card-title">
		                '. $evdate . '</br>' . $evgroup . '</br></br>' . $evname. '</br></br>Difficulty : ' . $eddiff . '
		          	</a></div></div>';
		    }
			$stmt->close();
		}
		else return 'Some db Error, try again';
		return $result;
	}

	//echo getUserLastAvgLevel('andreiarusoaie') . ' ' . getUserLastAvgCFLevel('TOURIST') ;
	//getAllRecommendationsCf();

?>