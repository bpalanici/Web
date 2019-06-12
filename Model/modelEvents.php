<?php

	require_once('databaseConn.php');
	session_start();
	error_reporting(E_ERROR | E_PARSE);

	function convert_seconds($seconds) {
		$dt1 = new DateTime("@0");
		$dt2 = new DateTime("@$seconds");
		return $dt1->diff($dt2)->format('%a d, %h h, %i min and %s s');
	}

	function getRecommendationsCf() {
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
		  		$result .= '<div class="card"><div class=flexInsideCard>
                <a class="card-title">';
			  	foreach ($value as $key2 => $value2) {
			  		if ($key2 == 'name') 
			  			$result .= $value2 . ' ';
			  		else if ($key2 == 'startTimeSeconds') {
			  			//echo $key2 . ' => ' . date('Y/m/d H:i:s', $value2). '</br>';
			  			$result .= '</br> Starts at : ' . date('Y/m/d H:i:s', $value2);
			  		}
			  		else if ($key2 == 'durationSeconds') {
			  			;
			  			//echo $key2 . ' => ' . convert_seconds($value2). '</br>';
			  		} 
			  		else if ($key2 == 'relativeTimeSeconds') {
			  			;
			  			//echo $key2 . ' => ' . convert_seconds(-$value2). '</br>';
			  		} 
			  		else ;
					//echo $key2 . ' => ' . $value2. '</br>';
			  	}
			  	$result = $result . ' </br>Difficulty : Easy</a>
                	<button class="buttonCard"> Apply </button>
              	</div></div>';
			}
		}	
		
		return $result ;
	}

	function getRecommendationsMeetup() {
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
		while ($i < count($date)) {
		  //echo $date[$i] . '</br>';
		  $i1 = 0;
		  while ($i1 < $eventsThatDate[$i])  {
		     $result .= '<div class="card"><div class=flexInsideCard>
	                <a class="card-title">' . $date[$i] . '</br> Group : ' . $group[$i + $i1 + $offset] . '</br></br>'. $name[$i + $i1 + $offset] . '</br></br>Difficulty : Hard</a>
	            	<button class="buttonCard"> Apply </button>
	          	</div></div>';
		     $i1++;
		     $offset++;
		  }
		  $offset--;
		  $i++;
		}
/*
		while ($i < count($date)) {
		  $result .= '<div class="card"><div class=flexInsideCard>
	                <a class="card-title">' . $date[$i] . ' ' . $group[$i] . ' '. $name[$i] . ' </br>Difficulty : Hard</a>
	            	<button class="buttonCard"> Apply </button>
	          	</div></div>';
		  $i++;
		}*/
/*
		foreach ($xpath->query('//div[contains(@class, \'unit size5of7 \')]/ul/li') as $key => $value) {
			if ($i == 1)
				$result .= '<div class="card"><div class=flexInsideCard>
	                <a class="card-title">';

			$result .= $value->nodeValue . '</br>';
			$i++;
			if ($i == 3) {
				$result = $result . ' </br>Difficulty : Hard</a>
	            	<button class="buttonCard"> Apply </button>
	          	</div></div>';
	          	$i = 1;
	        }
			
		}*/	

		return $result ;
	}

?>