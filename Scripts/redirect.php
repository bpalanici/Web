<?php

require_once('config.php');
require_once('google-login-api.php');
require_once('../Model/loginModel.php');

if(isset($_GET['code'])) { 
	try {
		// Get the access token
		$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

		// Access Token
		$access_token = $data['access_token'];
		
		// Get user information
		$user_info = GetUserProfileInfo($access_token);
		foreach ($user_info as $key => $value) {
			echo "Key : ". $key . " ; value : " . $value . '</br>'; 
		}

		if (IsRegistered($user_info['email']) == 1)
			header("Location: " . '../profile.html');
		else header("Location: " . '../register.html');
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>