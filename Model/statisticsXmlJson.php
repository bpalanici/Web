<?php
	require_once('databaseConn.php');
	session_start();
	$data = array();
	$counter = 0;
	$conn = db::getConnection();

	if ($stmt = $conn->prepare('select eventname, eventgroup, eventdiff, eventdate from events
			    where usergmail = ?')) {
			$stmt->bind_param("s", $_SESSION['userGmail']);
		    $stmt->execute();
		    $stmt->bind_result($evname, $evgroup, $eddiff, $evdate);
		    while ($stmt->fetch()) {
		    	$data[$counter]['EventName'] = $evname;
		    	$data[$counter]['EventGroup'] = $evgroup;
		    	$data[$counter]['EventDifficulty'] = $eddiff;
		    	$data[$counter]['EventDate'] = $evdate;
		    	$counter++;
		    }
			$stmt->close();
	}
	else die(5);

	file_put_contents('../STATISTICS/Eventsjson.txt', json_encode($data));

	function to_xml(SimpleXMLElement $object, array $data) {   
	    foreach ($data as $key => $value) {
	        if (is_array($value)) {
	            $new_object = $object->addChild($key);
	            to_xml($new_object, $value);
	        } else {
	            // if the key is an integer, it needs text with it to actually work.	            
	            $object->addChild($key, $value);
	        }   
	    }   
	}  

	$xml = new SimpleXMLElement('<root/>');
	to_xml($xml, $data);
	print $xml->asXML();
	file_put_contents('../STATISTICS/Eventsxml.txt', $xml->asXML());
?>