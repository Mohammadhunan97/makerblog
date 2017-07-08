<?php
include './db/db.php';
include './templates/header.php';
$bloguser = $_GET['blog'];
date_default_timezone_set('America/New_York');


$result = pg_query_params($db, "SELECT * FROM users WHERE username = $1;",array($bloguser));


while($blogger = pg_fetch_array($result)){
	$id = $blogger['id'];
	$username = $blogger['username'];
	$description = $blogger['description'];
	$background = $blogger['background'];
}


$query = pg_query_params($db, "SELECT * FROM posts WHERE user_id = $1;",array($id));
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
	<title>The blog of <?php echo $username ?></title>
</head>

<body>
	<header class='intro-header' style='background-image:url("<?php echo $background; ?>")'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                    <div class='site-heading'>
                        <h1>
                        	<?php echo $username; ?>

                        </h1>
                        <hr class='small'>
                        <span class='subheading'><p class='current-users-descr'><?php echo $description; ?></p></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php 

while($post = pg_fetch_array($query)){
	echo "<div class='container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                <div class='post-preview'>                
                        <h2 class='post-title'>
                            {$post['title']}
                        </h2>
                        <h3 class='post-subtitle'>
                           {$post['content']}
                        </h3>
                        <img src='{$post['image']}' alt='this image is not currently available'/>
                      <p class='post-meta'>Posted on "
                    . date("F j, Y, g:i a",strtotime($post["timestamp"])) 
                    . "</p> 
                </div>
            </div>
        </div>
</div>
<hr class='post-hr'/>";

}



?>






</body>




