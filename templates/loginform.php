<?php

$login = "
	<form class='loginform' action='users/login.php' method='post'>
		<h3 class='loginhead'>Login to your blog's admin panel</h3>
		<p class='loginlabel'>Username:</p><input class='loginuser' placeholder='username' name='username'>
		<br/>
		<p class='loginlabel'>Password:</p><input type='password'  class='loginpass' placeholder='password' name='password'>
		<br/>
		<input class='loginsubmit' type='submit'>
		<br />
		<br />
		<p class='loginsignup'>Don't have an account <a class='mysignup' href='#'>Signup</a></p>
	</form>

";

$signup ="<form class='signupform' action='users/signup.php' method='post'>
			<h3 class='loginhead'>Signup for a new Blog</h3>
			<p class='loginlabel'>Pick a Username:</p><input class='loginuser' placeholder='username' name='username'>
			<br/>
			<p class='loginlabel'>Choose a secure Password:</p><input type='password' class='loginpass' placeholder='password' name='password'>
			<br/>
			<input class='loginsubmit' type='submit'>
			<br />
			<br />
			<p class='loginsignup'>By signing up you are confirming that you are atleast 13 years of age or have parental permission. || Already have an account <a class='mylogin' href='#'>Login</a></p>
		</form>";

?>



