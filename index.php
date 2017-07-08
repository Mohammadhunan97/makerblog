<?php
session_start();
include 'db/db.php';
include 'templates/loginform.php';
include 'templates/video.php';
include 'templates/footer.php';

if($_SESSION['user']){
	echo "
	<script>
	window.location = 'write.php';
	</script>
	";
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Maker Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="btheme/css/clean-blog.min.css" rel="stylesheet">
	 <link href='btheme/vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link href='btheme/css/clean-blog.min.css' rel='stylesheet'>
    <link href='btheme/vendor/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nova+Flat" rel="stylesheet">

	<link rel='stylesheet' href='public/style.css'/>
	<link rel='stylesheet' href='public/messages.css'/>
</head>
<body>
	<h1 class='logo'> Maker Blogs </h1>
	<h3 class='build'>Build your blog the way you want. Share the content you want. </h3>
	<?php 
	if($_SESSION['message']){
		echo $_SESSION['message'];
	}

	if($user){

	}else{
		echo "<div class='cover'>";

		echo $login;
		echo $signup;
		echo "</div><br/>";
		echo $vidtext;

	}	
	?>
	<?php
	echo $footer;
	?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src='public/script.js'></script>
</body>
</html>