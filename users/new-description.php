<?php
session_start();
include '../db/db.php';

$description = $_GET["description"];


$query = pg_query_params($db, "UPDATE users SET description = $1 WHERE username = $2", array($description,$_SESSION['user']));
if($query){
	echo "<script> 
	console.log('query success');
	</script>
	";
}else{
	echo "<script> 
	console.log('query failure');
	</script>
	";
}



?>