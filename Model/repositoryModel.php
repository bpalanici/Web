<?php

require_once('databaseConn.php');

function getFiles($lang){
	$result = array();
	$conn = db::getConnection();

	if ($stmt = $conn->prepare('SELECT rawlink, score FROM scores where username = ? AND language = ?'))
    {   	
        $stmt->bind_param("ss", $_SESSION['username'], $lang);
	    $stmt->execute();
		$stmt->bind_result($link, $score);
	    while($stmt->fetch()){
	    	$result[$link] = $score;
	    }	

		$stmt->close();
	}else {
		return 'Something went wrong..';
	}

	return $result;
}

function getLevel($avg){
	if($avg < 2.5){
		return 'Incepator';
	}else if($avg < 5){
		return 'Mediu';
	}else if($avg < 7.5){
		return 'Avansat';
	}else{
		return 'Expert';
	}
}

function insertNewStat($lang, $avg){
	$level = getLevel($avg);
	$conn = db::getConnection();

	if ($stmt = $conn->prepare('SELECT max(iteration) FROM userstats where username = ? AND language = ?'))
    {   	
        $stmt->bind_param("ss", $_SESSION['username'], $lang);
	    $stmt->execute();
	    $stmt->bind_result($iteration);
	    $stmt->fetch();
		$stmt->close();
	}else {
		return -1;
	}

	if ($stmt = $conn->prepare('SELECT max(scoreAvg) FROM userstats where username = ? AND language = ?'))
    {   	
        $stmt->bind_param("ss", $_SESSION['username'], $lang);
	    $stmt->execute();
	    $stmt->bind_result($old_avg);
	    $stmt->fetch();
		$stmt->close();
	}else {
		return -1;
	}

	$iteration += 1;
	if($old_avg == 0){
		$new_evolution = 100;
	}else{
		$new_evolution = $avg / $old_avg - 1;
	}
	
	if ($stmt = $conn->prepare('INSERT INTO userstats (username, iteration, language, scoreAvg, level, evolution) Values (?, ?, ?, ?, ?, ?)')) {
	    $stmt->bind_param("ssssss", $_SESSION['username'], $iteration, $lang, $avg, $level, $new_evolution);
	    $stmt->execute();
		$stmt->close();
	}else{
		return -1;
	} 

	return $new_evolution;
}

function getScores($id){
	if(in_array('Python', $_SESSION['repo_' . $id]['langs'])){
		$lang = 'Python';
	}else if(in_array('Java', $_SESSION['repo_' . $id]['langs'])){
		$lang = 'Java';
	}else{
		return 1;
	}

	$rawlink = getFiles($lang);
	$result =  '<div class="repo-container">
					<div class="repo-text">
						<b>URL</b> : ' . $_SESSION['repo_' . $id]['url'] . '<br>
						<b>Name</b> : ' .$_SESSION['repo_' . $id]['name'] . '<br>
					</div>
					<hr>
					The scores are like [GRADE]/10 : ';
	$nrOfLinks = 0;
	$sum = 0;
	foreach($rawlink as $link => $score){
		$sum += $score;
		$nrOfLinks += 1;
		$pieces = explode("/", $link);

		$result .= '<div class="link-score">
						-- ' . $pieces[count($pieces) - 1] . " ===> " . $score . '
					</div>';
	}
	if($nrOfLinks == 0){
		$avg = 0;
	}else{
		$avg = round($sum / $nrOfLinks, 2);
	}

	$result .= '<hr>
				<div class="repo-stats">
					<b>Average</b> : ' . $avg . ' (out of 10)<br>';
	$evolution = insertNewStat($lang, $avg);
	if($evolution == -1){
		$result .= '<b>Evolution</b> : Something went wrong..';
	}else{
		$result .= '<b>Evolution</b> : ' . $evolution . "%<br>";
	}

	$result .= '<b>Level</b> : ' . getLevel($avg) . '<br>';
	$result .= '</div></div>';
	
	return $result;
}

?>