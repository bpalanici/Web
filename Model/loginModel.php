<?php 

function IsRegistered($client_username) {	
	$user = 'root';
	$pass = '';
	$db = 'web';
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to conn");

	if ($stmt = $conn->prepare('SELECT count(*) FROM users where mail = ?')) {
	    $stmt->bind_param("s", $client_username);
	    $stmt->execute();
	    $stmt->bind_result($rez);
	    $stmt->fetch();

		$stmt->close();
		$conn->close();
		return $rez; 
	}
	mysqli_close($conn);
	return 0;
}

//echo IsRegistered('a@a');

?>