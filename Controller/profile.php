<?php
require_once("Model/profileModel.php");
// Seteaza variabilele corespunzatoare din sesiune 
function getDataFromGithub(){
	$repos = getRepos();
	if(isset($repos['message'])){
		return 1;
	}
	$_SESSION['length'] = 0;
	$_SESSION['avatar_url'] = $repos[0]['owner']['avatar_url'];
	
	foreach($repos as $index => $repo){
		$_SESSION['length'] += 1;
		$_SESSION['repo_' . $index] = array();
		$_SESSION['repo_' . $index]['name'] = $repo['name'];
		$_SESSION['repo_' . $index]['url'] = $repo['url'];
		$languages = getLanguages($repo);
		$_SESSION['repo_' . $index]['langs'] = array();
		$_SESSION['repo_' . $index]['bytes'] = array();
		foreach($languages as $lang => $nrOfBytes){
			array_push($_SESSION['repo_' . $index]['langs'], $lang);
			array_push($_SESSION['repo_' . $index]['bytes'], $nrOfBytes);
		}
		$stats = getStatistics($repo);
		$_SESSION['repo_' . $index]['additions'] = 0;
		$_SESSION['repo_' . $index]['deletions'] = 0;
		$_SESSION['repo_' . $index]['commits'] = 0;
		if (is_null($stats)){	
			continue;
		}
		foreach($stats as $i => $stat){
			$_SESSION['repo_' . $index]['additions'] += $stats[$i]['weeks'][0]['a'];
			$_SESSION['repo_' . $index]['deletions'] += $stats[$i]['weeks'][0]['d'];
			$_SESSION['repo_' . $index]['commits'] += $stats[$i]['weeks'][0]['c'];
		}
 	}
 	return 0;
}
function getData(){
	if(!isset($_SESSION['lastUser'])){
		$_SESSION['lastUser'] = 'notloggedin';
	}
	$err = 0;
	if($_SESSION['lastUser'] != $_SESSION['username']){
		$_SESSION['lastUser'] = $_SESSION['username'];
		$_SESSION['username'] = getUsername($_SESSION['userGmail']);
		$err = getDataFromGithub();
	}
	if($err == 1){
		return "Rate limit exceeded..";
	}
	$result = "";
	echo getPicture();
	for($i = 0;$i < $_SESSION['length'];$i++){
		$result .= '<div class="item">
			          <div class="item-language" onclick="window.location.replace(\'repository.php?id=' . $i . '\');">
			            ' . $_SESSION['repo_' . $i]['name'] . '
			          <hr>
			          </div>
			          <div class="item-list">
			              <div class="info">Additions : ' . $_SESSION['repo_' . $i]['additions'] . '</div>
			              <div class="info">Deletions : ' . $_SESSION['repo_' . $i]['deletions'] . '</div>
			              <div class="info">Commits : ' . $_SESSION['repo_' . $i]['commits'] . '</div>
			              <div class="info">' . json_encode($_SESSION['repo_' . $i]['langs']) . '</div>
			          </div>
			      </div>';
	}
	return $result;
}

function getPicture(){
	return '<style type="text/css">
	        .profile-pic {
	            background: url(' . $_SESSION['avatar_url'] . ');
	            background-repeat: no-repeat;
				background-size: contain;
	        }
	        </style>';
}

function getVar($var){
	if(isset($_SESSION[$var])){
		return $_SESSION[$var];
	}
	return NULL;
}
?>