<?php 

function IsRegistered($client_username) {	
	$user = 'root';
	$pass = '';
	$db = 'web';
	$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to conn");

	$query = 'SELECT count(*) as a FROM users where mail = \'' . $client_username . '\''; 
	if ($rez = $conn->query($query)) {
	    $query_executed = $rez->fetch_assoc();
	    return $query_executed['a']; 
	}

	return 0;
}
echo IsRegistered('bpalanici1337@gmail.com');

?>