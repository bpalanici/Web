<?php

$username = strip_tags($_POST['ID']);
$email = strip_tags($_POST['Email']);

$pass_hash = password_hash(strip_tags($_POST['Password']), PASSWORD_DEFAULT);
$confirm_pass = strip_tags($_POST['CPassword']);

$errorMsg = "Your account has been created succesfully!";
$link = "../login.html";
$valid = true;

if (!preg_match('/([_a-zA-Z0-9][_a-zA-Z0-9][_a-zA-Z0-9][_a-zA-Z0-9]+)/', $username)){
	$errorMsg = "Invalid username.";
	$link = "../register.html";
	$valid = false;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errorMsg = "Invalid email format.";
	$link = "../register.html";
	$valid = false;
}

if(!password_verify($confirm_pass, $pass_hash)){
	$errorMsg = "Passwords do not match.";
	$link = "../register.html";
	$valid = false;
}

echo "<script type='text/javascript'>alert('" . $errorMsg . "');window.location='" . $link . "'</script>";

?>