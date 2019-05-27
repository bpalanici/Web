<?php

require_once('config.php');
require_once('google-login-api.php');

if(isset($_GET['code'])) {
	try {
		// Get the access token
		$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

		// Access Token
		$access_token = $data['access_token'];
		
		// Get user information
		$user_info = GetUserProfileInfo($access_token);
		header("Location: " . '../profile.html');
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>