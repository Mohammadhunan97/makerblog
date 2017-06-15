<?php
session_start();
include '../db/db.php';

$id = $_GET["id"];
$title = $_POST["title"];
$content = $_POST["content"];
$image = $_POST["image"];


$query  = pg_query_params($db, "UPDATE POSTS set title=$1, content=$2, image=$3 WHERE id=$4;", array($title,$content,$image,$id));

?>