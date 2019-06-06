<?php
	class db {
    private static $conn = null;
    public static function getConnection() {
      	$user = 'root';
		$pass = '';
		$db = 'web';
		if (self::$conn == null)
			self::$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to conn");
		return self::$conn;
    }
   }
?>