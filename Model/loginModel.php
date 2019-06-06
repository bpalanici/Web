<?php 

	require_once('databaseConn.php');

	function IsRegistered($client_username) {	
		$user = 'root';
		$pass = '';
		$db = 'web';
		$conn = db::getConnection();

		if ($stmt = $conn->prepare('SELECT count(*) FROM users where mail = ?')) {
		    $stmt->bind_param("s", $client_username);
		    $stmt->execute();
		    $stmt->bind_result($rez);
		    $stmt->fetch();

			$stmt->close();
			return $rez; 
		}
		return 0;
	}

	//echo IsRegistered('a@dasda');

?>