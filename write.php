<?php
session_start();
include 'db/db.php';
include 'templates/loginform.php';
include 'templates/video.php';
include 'templates/footer.php';
include 'templates/header.php';
include 'templates/logout.php';
include 'templates/background.php';
include 'templates/newpost.php';
if(!$_SESSION['user']){
	echo "<script>
	window.location = '/';
	</script>";
}

 ?>
<!DOCTYPE html>
<html>
<head>
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
	<title><?php echo $_SESSION['user']?>  Admin Panel</title>
</head>
<body>
	<div class='bgchange'> <?php echo $background ?> </div>
	<?php echo $header ?>
	<?php echo $logout ?>
	<?php include 'templates/allposts.php'; ?>

	<?php echo $footer?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src='public/script.js'></script>
</body>
</html>