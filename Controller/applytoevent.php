<?php

	require_once('../Model/applytoeventmodel.php');
	$date = new DateTime();
  	$date->setTimestamp(strtotime($_GET['date']));
	//echo $date->format('Y/m/d');
	

  	session_start();
	echo "<script type='text/javascript'>alert('Status of apply : " . applyToEvent($_SESSION['userGmail'], $_GET['name'], $_GET['group'], $_GET['diff'], $date->format('Y/m/d')) . "');window.location=' ../eventsRecommendations.php'</script>";
	
?>