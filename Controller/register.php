<?php

	require_once('../Model/register.php');
	session_start();

	$username = strip_tags($_POST['ID']);
	$cfusername = strip_tags($_POST['cfusername']); 

	$options = $_POST['select'];

	$reutrnMsg = "Your account has been created succesfully!";
	$link = "../profile.php";
	$listOfLanguages = array('c++', 'c#', 'java', 'kotlin', 'php', 'javascript', 'python');

	foreach ($options as $key => $value) {
		if (!in_array($value, $listOfLanguages, true)) {
			$reutrnMsg = "Invalid option.";
			$link = "../register.html";
			echo "<script type='text/javascript'>alert('" . $reutrnMsg . "');window.location='" . $link . "'</script>";
			exit(0);
		}
	}

	if (!count($options)) {
		$reutrnMsg = "Select at least 1 language";
		$link = "../register.html";
		echo "<script type='text/javascript'>alert('" . $reutrnMsg . "');window.location='" . $link . "'</script>";
		exit(0);
	}

	if (!ctype_alnum($username)) {
		$reutrnMsg = "Invalid username. Must contain only letters";
		$link = "../register.html";
		echo "<script type='text/javascript'>alert('" . $reutrnMsg . "');window.location='" . $link . "'</script>";
		exit(0);
	}

	$registerMsg = register($username, $cfusername, $options);

	if ($registerMsg != 'ok') {
		$reutrnMsg = "Error : " . $registerMsg;
		$link = "../register.html";
		echo "<script type='text/javascript'>alert('" . $reutrnMsg . "');window.location='" . $link . "'</script>";
		exit(0);
	};
	echo "<script type='text/javascript'>alert('" . $reutrnMsg . "');window.location='" . $link . "'</script>";


?>