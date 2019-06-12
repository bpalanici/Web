<?php

	require_once('config.php');
	require_once('google-login-api.php');
	require_once('../Model/loginModel.php');
	session_start();

	if(isset($_GET['code'])) { 
		try {
			// Get the access token
			$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

			// Access Token
			$access_token = $data['access_token'];
			
			// Get user information
			$user_info = GetUserProfileInfo($access_token);
			session_start();
			$_SESSION['userGmail'] = $user_info['email'];
			if (IsRegistered($user_info['email']) == 1) {
				
				header("Location: " . '../profile.php');
			}
			else header("Location: " . '../register.html');
		}
		catch(Exception $e) {
			echo $e->getMessage();
			exit(5);
		}
	}
	else exit(5);

?>