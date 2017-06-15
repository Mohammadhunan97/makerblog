<?php
session_start();
include '../db/db.php';

$title = $_POST["title"];
$content = $_POST["content"];
$image = $_POST["image"];


$query = pg_query_params($db, "INSERT INTO posts(title,content,image,user_id)VALUES($1,$2,$3,$4)", array($title,$content,$image,$_SESSION['id']));




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