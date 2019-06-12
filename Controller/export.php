<?php
	require_once('../Model/statisticsXmlJson.php');	

  	session_start();
	error_reporting(E_ERROR | E_PARSE);
	echo "<script type='text/javascript'>alert('Status of export : " . export() . "');window.location=' ../profile.php'</script>";
?>