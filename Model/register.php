<?php

	require_once('databaseConn.php');
	session_start();

	function register($username, $languages) {
		$conn = db::getConnection();
		if ($stmt = $conn->prepare('SELECT count(*) FROM users where username = ?')) {
		    $stmt->bind_param("s", $username);
		    $stmt->execute();
		    $stmt->bind_result($rez);
		    $stmt->fetch();
			$stmt->close();
			if ($rez == 1)
				return 'User already exists, chose another username'; 
		}
		else return 'Some db Error, try again';

		if ($stmt = $conn->prepare('INSERT INTO users (username, mail) Values (?, ?)')) {
		    $stmt->bind_param("ss", $username, $_SESSION['userGmail']);
		    $stmt->execute();
			$stmt->close();
		}
		else return 'Some db Error, try again 2';

		if ($stmt = $conn->prepare('INSERT INTO userlanguages (username, languagename) Values (?, ?)')) {
		    foreach ($languages as $key => $value) {
		    	$stmt->bind_param("ss", $username, $value);
		    	$stmt->execute();
		    }
			$stmt->close();
		}
		else return 'Some db Error, try again 3';

		return 'ok';
	}

?>