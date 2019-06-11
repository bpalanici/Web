<?php

	require_once('databaseConn.php');
	session_start();

	function register($username, $cfusername, $languages) {
		$conn = db::getConnection();
		if (checkIfCfAccExists($cfusername) != 'ok')
			return 'CodeForces Account with this username does not exists';
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

		if ($stmt = $conn->prepare('INSERT INTO users (username, mail, cfusername) Values (?, ?, ?)')) {
		    $stmt->bind_param("sss", $username, $_SESSION['userGmail'], $cfusername);
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
		$_SESSION['cfusername'] = $cfusername;
		return 'ok';
	}

	function checkIfCfAccExists($cfusername) {
		$result = '';

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL,'https://codeforces.com/api/user.status?handle=' . $cfusername);              // stabilim URL-ul serviciului
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);  // rezultatul cererii va fi disponibil ca șir de caractere
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false); // nu verificam certificatul digital
		$res = curl_exec($c);                           // executam cererea GET
		curl_close($c);

		$data = json_decode($res, true);

		if ($data['status'] == 'OK')
			return 'ok';
		return 'not ok';
	}



?>