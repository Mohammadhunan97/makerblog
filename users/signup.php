<?php 
session_start();
include '../db/db.php';
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$newuser = pg_query_params($db, "INSERT into users (username,password) VALUES($1,$2)", array($username,$password));
	echo $newuser;

if(!$newuser){
	$returnuser = pg_query_params($db, "SELECT username FROM users WHERE username = $1", array($username));
	echo "<p class='user-exist-error'>the username <strong>{$username}</strong> already exists</p>";
	$_SESSION['message'] = "<p class='user-exist-error'>the username <strong>{$username}</strong> already exists</p>";
	echo "<script>
	setTimeout(function(){
			window.location = '/';
	},1000);
	</script>";
}else{
	$_SESSION['message'] = "<p class='user-created-success'>Congratulations, <strong>{$username}</strong> your account was created</p>";
	echo "<script>
	setTimeout(function(){
			window.location = '/';
	},1000);
	</script>";
}
?>