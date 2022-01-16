<?php
session_start();
if (isset($_SESSION['username']))
   echo "You are logged in as " . $_SESSION['username'];
else
   echo "You are not logged in";
?>

<html>

<head>
  <link rel="stylesheet" href="styles/main.css">
</head>


<h4>Register</h4>
<form action='register.php' method="POST">
	<div class="main">
		<div class="field">
			<label for="n">username: </label>
			<input type="text" id="n" name="username" size="25">
		</div>
		<div class="field">
			<label for="ln">password: </label>
			<input type="password" id="ln" name="password" size="25">
		</div>
		<input type="submit" value="Submit"/>
	</div>
</form>

<h4>Login</h4>
<form action='login.php' method="POST">
        <div class="main">
                <div class="field">
                        <label for="n">username: </label>
                        <input type="text" id="n" name="username" size="25">
                </div>
                <div class="field">
                        <label for="ln">password: </label>
                        <input type="password" id="ln" name="password" size="25">
                </div>
                <input type="submit" value="Submit"/>
        </div>
</form>
<a class="rules" href="books.php">Books(you must be logged in)</a>

</html>
