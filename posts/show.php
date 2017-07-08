<?php
session_start();
include '../db/db.php';

$id = $_GET["id"];

$result = pg_query_params($db, "SELECT * FROM posts WHERE id = $1", array($id));

$myObj = new StdClass;
while($post = pg_fetch_array($result)){
	$myObj->id = $post['id'];
	$myObj->title = $post['title'];
	$myObj->content = $post['content'];
	$myObj->image = $post['image'];
 }

$myJSON = json_encode($myObj);

echo $myJSON;
?>