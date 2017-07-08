<?php 
session_start();
include '../db/db.php';


$username = $_POST["username"];
$password = $_POST["password"];



$currentuser = pg_query_params($db, "SELECT * FROM users WHERE username = $1", array($username));



while($row = pg_fetch_array($currentuser)){
	echo "<br/>" . $row["username"];
	if(password_verify($password , $row["password"])){
		echo " password was correct";
		$_SESSION['user'] = $row["username"];
		$_SESSION['id'] = $row["id"];
		
		$_SESSION['message'] = "<p class='user-login-success'>User account, <strong>{$username}</strong> logged in successfully</p>";
		echo "<script>
		setTimeout(function(){
				window.location = '../write.php';
		},1000);
		</script>";
	}else{
		echo " failure";
	}
}
?>