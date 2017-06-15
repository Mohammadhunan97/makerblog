<?php
session_start();
include './db/db.php';

$currentuser = pg_query_params($db, "SELECT * FROM users WHERE username = $1", array($_SESSION['user']));
while($user = pg_fetch_array($currentuser)){


$header = "<header class='intro-header' style='background-image:url({$user['background']})'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                    <div class='site-heading'>
                        <h1>{$_SESSION['user']}</h1>
                        <hr class='small'>
                        <span class='subheading'><p class='current-users-descr'>{$user['description']}</p><br/> <button class='edit-user-description'>Edit Description</button></span>
                        <div class='new-description'>
                            <form class='new-desc' action='#' method='post'>
                                <input class='new-user-description' name='description' placeholder='type in your new description' />
                                <input class='description-submit' type='submit' />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>";



}



?>