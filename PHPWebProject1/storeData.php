<?php

class User {
	public $users = 'users';

	function __construct(){
		/* database configuration */
		$dbServer = '192.168.1.50';
		$dbUsername = 'root';
		$dbPassword = 'Admin@123';
		$dbName = 'facebook';

		/* connect database */
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connection = $con;
		}
	}

	function checkFBUserData($user){
		$prev_query = mysqli_query($this->connection,"SELECT * FROM ".$this->users." WHERE facebook_id = '".$user['id']."'") or die(mysqli_error($this->connection));
		if(mysqli_num_rows($prev_query)>0){
			$update = mysqli_query($this->connection,"UPDATE $this->users SET facebook_id = '".$user['id']."', first_name = '".$user['first_name']."', last_name = '".$user['last_name']."', email = '".$user['email']."', gender = '".$user['gender']."', picture = '".$user['picture']['data']['url']."' WHERE facebook_id = '".$user['id']."'");
		}else{
			$insert = mysqli_query($this->connection,"INSERT INTO $this->users SET facebook_id = '".$user['id']."', first_name = '".$user['first_name']."', last_name = '".$user['last_name']."', email = '".$user['email']."', gender = '".$user['gender']."', picture = '".$user['picture']['data']['url']."'");
		}


		$query = mysqli_query($this->connection,"SELECT * FROM $this->users WHERE facebook_id = '".$user['id']."'");
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>