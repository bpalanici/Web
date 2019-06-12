<?php

	require_once('databaseConn.php');
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	function convert_seconds($seconds) {
		$dt1 = new DateTime("@0");
		$dt2 = new DateTime("@$seconds");
		return $dt1->diff($dt2)->format('%a d, %h h, %i min and %s s');
	}

	function isEventInDatabase($evname, $evgroup, $evdate) {
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('SELECT count(*) FROM eventsall where eventname = ? &&
			eventgroup = ? && eventdate = ?')) {
		    $stmt->bind_param("sss", $evname, $evgroup, $evdate);
		    $stmt->execute();
		    $stmt->bind_result($rez);
		    $stmt->fetch();
			$stmt->close();
			if ($rez != 0)
				return true; 
		}
		return false;
	}

	function addEventInDatabase($evname, $evgroup, $eddiff, $evdate) {
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('INSERT INTO eventsall (eventname, eventgroup, eventdiff, eventdate) Values (?, ?, ?, ?)')) {
		    $stmt->bind_param("ssss", $evname, $evgroup, $eddiff, $evdate);
		    $stmt->execute();
			$stmt->close();
		}
		else return 'Some db Error, try again 2';
	}

	function addRecommendationsCf() {
		$result = '';

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL,'https://codeforces.com/api/contest.list');              // stabilim URL-ul serviciului
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
		$res = curl_exec($c);                           // executam cererea GET
		curl_close($c);

		$data = json_decode($res, true);

		$i = 1;

		foreach ($data['result'] as $key => $value) {
		  	if ($value['phase'] == 'BEFORE') {
		  		$evname = '';
		  		$evgroup = 'codeforces';
			  	foreach ($value as $key2 => $value2) {
			  		if ($key2 == 'name') 
			  			$evname =	$value2;
			  		else if ($key2 == 'startTimeSeconds') {
			  			$evdate = date('Y/m/d', $value2);
			  		}
			  	}
			  	if (isEventInDatabase($evname, $evgroup, $evdate) == false) {
			  		$r = rand(1, 4);
			  		if ($r == 1)
			  			$eddiff = 'incepator';
			  		if ($r == 2)
			  			$eddiff = 'mediu';
			  		if ($r == 3)
			  			$eddiff = 'avansat';
			  		if ($r == 4)
			  			$eddiff = 'experimentat';
			  		addEventInDatabase($evname, $evgroup, $eddiff, $evdate);
			  	}
			}
		}


		foreach ($data['result'] as $key => $value) {
		  	if ($value['phase'] == 'BEFORE') {
		  		$result .= '<div class="card"><div class=flexInsideCard>
                <form action="Controller/applytoevent.php" method="get"><a class="card-title">';
			  	foreach ($value as $key2 => $value2) {
			  		if ($key2 == 'name') 
			  			$result .= '<input type="hidden" name="name" value="' . $value2 . '"> ' . $value2;
			  		else if ($key2 == 'startTimeSeconds') {
			  			//echo $key2 . ' => ' . date('Y/m/d H:i:s', $value2). '</br>';
			  			$result .= '</br> Starts at : <input type="hidden" name="date" value="' . date('Y/m/d H:i:s', $value2) . '">' . date('Y/m/d H:i:s', $value2);
			  		}
			  	}
			  	$result = $result . ' </br>Difficulty : Easy <input type="hidden" name="diff" value="easy"> <input type="hidden" name="group" value="codeforces"></br></a><input type="submit" class="buttonCard" value="Apply">
	          	</form>
              	</div></div>';
			}
		}	

		return $result ;
	}

	function addRecommendationsMeetup() {
		$result = '';   

		error_reporting(E_ERROR | E_PARSE);
		$dom = new domDocument; 

		$htmlContent = file_get_contents('https://www.meetup.com/find/events/tech/?allMeetups=false&radius=100&userFreeform=Iasi%2C+Romania&mcId=c1033319&mcName=Iasi%2C+RO');
		$dom->loadHTML($htmlContent); 

		$xpath = new DOMXpath($dom);
		$xpath2 = new DOMXpath($dom);
		$date = array();
		$eventsThatDate = array();
		$group = array();
		$name = array();

		$i = 1;
		$index = 0;
		foreach ($xpath->query('//div[contains(@class, \'unit size5of7 \')]/ul/li') as $key => $value) {
		  if ($i == 1) {
		  	$date[$index] = $value->nodeValue . ' ';
		     $index++;
		  }
		  else {
		     $eventsThatDate[$index - 1] = count(explode('going', $value->nodeValue)) - 1;
		  }
		  $i = 3 - $i;
		}

		$i = 0;
		foreach ($xpath->query('//a/span[contains(@itemprop, \'name\')]') as $key => $value) {
		 if ($i % 2 == 0) 
		    $group[$i / 2] .= $value->nodeValue . ' ';
		 else 
		    $name[($i - 1) / 2] .= $value->nodeValue . ' ';
		 $i++;
		}

		$i = 0;
		$offset = 0;
	    $dateTemp = new DateTime();

		while ($i < count($date)) {
		  $i1 = 0;
		  while ($i1 < $eventsThatDate[$i])  {
	        $evname = $name[$i + $i1 + $offset];
	        $evgroup = $group[$i + $i1 + $offset];

		   	$dateTemp->setTimestamp(strtotime($date[$i]));
		   	$evdate = $dateTemp->format('Y/m/d');

	        if (isEventInDatabase($evname, $evgroup, $evdate) == false) {
		  		$r = rand(1, 4);
		  		if ($r == 1)
		  			$eddiff = 'incepator';
		  		if ($r == 2)
		  			$eddiff = 'mediu';
		  		if ($r == 3)
		  			$eddiff = 'avansat';
		  		if ($r == 4)
		  			$eddiff = 'experimentat';
		  		addEventInDatabase($evname, $evgroup, $eddiff, $evdate);
		  	}

		    $i1++;
		    $offset++;
		  }
		  $offset--;
		  $i++;
		}

		$i = 0;
		$result = '';
		while ($i < count($date)) {
		  $i1 = 0;
		  while ($i1 < $eventsThatDate[$i])  {
		     $result .= '<div class="card"><div class=flexInsideCard>
	                <form action="Controller/applytoevent.php" method="get"><a class="card-title"><input type="hidden" name="date" value="' . $date[$i] . '">' . $date[$i] . '</br> Group : <input type="hidden" name="group" value="' . $group[$i + $i1 + $offset] . '">' . $group[$i + $i1 + $offset] . '<input type="hidden" name="name" value="' . $name[$i + $i1 + $offset] . '">' . $name[$i + $i1 + $offset]. '</br></br>Difficulty : Hard</a>
	                <input type="hidden" name="diff" value="Hard">
	            	<input type="submit" class="buttonCard" value="Apply">
	          	</form></div></div>';

		     $i1++;
		     $offset++;
		  }
		  $offset--;
		  $i++;
		}
		return $result ;
	}

	function getAllRecommendations() {
		$result = '';
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('SELECT eventname, eventgroup, eventdiff, eventdate FROM eventsall
			where (eventname, eventgroup, eventdate) not in (
			    select eventname, eventgroup, eventdate from events
			    where usergmail = ?)' )) {
			
			$stmt->bind_param("s", $_SESSION['userGmail']);
		    $stmt->execute();
		    $stmt->bind_result($evname, $evgroup, $eddiff, $evdate);
		    while ($stmt->fetch()) {
		    	$result .= '<div class="card"><div class=flexInsideCard>
	                <form action="Controller/applytoevent.php" method="get"><a class="card-title"><input type="hidden" name="date" value="' . $evdate . '">' . $evdate . '</br> Group : <input type="hidden" name="group" value="' . $evgroup . '">' . $evgroup . '<input type="hidden" name="name" value="' . $evname . '">' . $evname. '</br></br>Difficulty : ' . $eddiff . '</a>
	                <input type="hidden" name="diff" value="' . $eddiff . '">
	            	<input type="submit" class="buttonCard" value="Apply">
	          	</form></div></div>';
		    }
			$stmt->close();
			if ($rez == 1)
				return 'User already exists, chose another username'; 
		}
		else return 'Some db Error, try again';
		return $result;
	}

?>