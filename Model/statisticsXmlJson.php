<?php
	require_once('databaseConn.php');
	session_start();

	function to_xml(SimpleXMLElement $object, array $data) {   
	    foreach ($data as $key => $value) {
	        if (is_array($value)) {
	            $new_object = $object->addChild($key);
	            to_xml($new_object, $value);
	        } else {
	           	$object->addChild($key, $value);
	        }   
	    }   
	}  
	function export() {
		$data = array();
		$counter = 0;
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('select eventname, eventgroup, eventdiff, eventdate from events
				    where usergmail = ?')) {
				$stmt->bind_param("s", $_SESSION['userGmail']);
			    $stmt->execute();
			    $stmt->bind_result($evname, $evgroup, $eddiff, $evdate);
			    while ($stmt->fetch()) {
			    	$data['k' . $counter]['EventName'] = $evname;
			    	$data['k' . $counter]['EventGroup'] = $evgroup;
			    	$data['k' . $counter]['EventDifficulty'] = $eddiff;
			    	$data['k' . $counter]['EventDate'] = $evdate;
			    	$counter++;
			    }
				$stmt->close();
		}
		else die(5);

		file_put_contents('../STATISTICS/Eventsjson.txt', json_encode($data));

		$xml = new SimpleXMLElement('<root/>');
		to_xml($xml, $data);
		print $xml->asXML();
		file_put_contents('../STATISTICS/Eventsxml.txt', $xml->asXML());

		$data = array();
		$counter = 0;
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('select cfusername, nraccepted, nrsolved, date, nrsubmissions from cfstatistics
				    where usergmail = ?')) {
				$stmt->bind_param("s", $_SESSION['userGmail']);
			    $stmt->execute();
			    $stmt->bind_result($cfusername, $nraccepted, $nrsolved, $date, $nrsubmissions);
			    while ($stmt->fetch()) {
			    	$data['k' . $counter]['CfUsername'] = $cfusername;
			    	$data['k' . $counter]['NrAccepted'] = $nraccepted;
			    	$data['k' . $counter]['NrSolved'] = $nrsolved;
			    	$data['k' . $counter]['date'] = $date;
			    	$data['k' . $counter]['NrSubmissions'] = $nrsubmissions;
			    	$counter++;
			    }
				$stmt->close();
		}
		else die(5);

		file_put_contents('../STATISTICS/Cfsjson.txt', json_encode($data));

		$xml = new SimpleXMLElement('<root/>');
		to_xml($xml, $data);
		print $xml->asXML();
		file_put_contents('../STATISTICS/Cfsxml.txt', $xml->asXML());

		$data = array();
		$counter = 0;
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('select iteration, username, rawlink, filename, language, score from scores
				    where username = ?')) {
				$stmt->bind_param("s", $_SESSION['username']);
			    $stmt->execute();
			    $stmt->bind_result($iteration, $username, $rawlink, $filename, $language, $score);
			    while ($stmt->fetch()) {
			    	$data['k' . $counter]['iteration'] = $iteration;
			    	$data['k' . $counter]['username'] = $username;
			    	$data['k' . $counter]['rawlink'] = $rawlink;
			    	$data['k' . $counter]['filename'] = $filename;
			    	$data['k' . $counter]['language'] = $language;
			    	$data['k' . $counter]['score'] = $score;
			    	$counter++;
			    }
				$stmt->close();
		}
		else die(5);

		file_put_contents('../STATISTICS/Scoresjson.txt', json_encode($data));

		$xml = new SimpleXMLElement('<root/>');
		to_xml($xml, $data);
		print $xml->asXML();
		file_put_contents('../STATISTICS/ScoresCfsxml.txt', $xml->asXML());


		return 'ok';
	}


?>