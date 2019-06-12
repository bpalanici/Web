<?php 

	require_once('databaseConn.php');
	session_start();

	function IsRegistered($client_mail) {	
		$user = 'root';
		$pass = '';
		$db = 'web';
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('SELECT count(*) FROM users where mail = ?')) {
		    $stmt->bind_param("s", $client_mail);
		    $stmt->execute();
		    $stmt->bind_result($rez);
		    $stmt->fetch();

			$stmt->close();
			if ($rez == 1) {
				if ($stmt2 = $conn->prepare('SELECT cfusername FROM users where mail = ?')) {
				    $stmt2->bind_param("s", $client_mail);
				    $stmt2->execute();
				    $stmt2->bind_result($rez2);
				    $stmt2->fetch();

					$stmt2->close();
					$_SESSION['cfusername'] = $rez2;
				}
				else return 0;
				if ($stmt2 = $conn->prepare('SELECT username FROM users where mail = ?')) {
				    $stmt2->bind_param("s", $client_mail);
				    $stmt2->execute();
				    $stmt2->bind_result($rez2);
				    $stmt2->fetch();

					$stmt2->close();
					$_SESSION['username'] = $rez2;
				}
				else return 0;
			}
			return $rez; 
		}
		return 0;
	}

	echo IsRegistered('a@dasda') . $_SESSION['username'];

?>