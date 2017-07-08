<?php
session_start();
include '../db/db.php';

$bg = $_GET["bg"];


$query = pg_query_params($db, "UPDATE users SET background = $1 WHERE username = $2", array($bg,$_SESSION['user']));

echo $description;
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