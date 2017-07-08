<?php
session_start();
include '../db/db.php';


$id = $_GET["id"];

pg_query_params($db, "DELETE FROM posts WHERE id = $1", array($id));


echo "<script>
window.location = '/'
</script>";

?>