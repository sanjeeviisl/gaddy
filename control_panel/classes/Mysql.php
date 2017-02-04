<?php

require_once 'includes/constants.php';
//require '../common/membership/classes/includes/constants.php';
require_once '../wp-includes/class-phpass.php';


class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	
	function verify_Username_and_Pass($un, $pwd) {
		
				
		$query = "SELECT user_pass
				FROM wp_users
				WHERE user_login = ? AND user_nicename = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $un);
			$stmt->execute();
			
			/* bind result variables */
			$stmt->bind_result($pass);

			if($stmt->fetch()) {
				
				$password_hashed = $pass;
				$plain_password = $pwd;
				$wp_hasher = new PasswordHash(8, TRUE);

				if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
               				$stmt->close();
					return true;
				} else {
				        $stmt->close();		
			                return false;
				}
		
			}
		}
		
	}
}