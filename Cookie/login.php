<?php
session_start();

if (isset($_SESSION['login'])) {
	header('Location: latian.php');
	exit;
}

require 'function.php';

    if (isset($_POST['login'])) {
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	
    	$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
    	
    		//cek username 
    		if(mysqli_num_rows($result) === 1) {
    			$row = mysqli_fetch_assoc($result);
    		
    		// Check apakah string yg dimasukkan user sama dgn hash di db
    		if (password_verify($password, $row["password"])) {
    			
    			$_SESSION['login'] = true;
    			//redirect
    			header("Location: latian.php");
    			exit;
    		} 	
    	}	else {
    				$error = true;
   			}
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
		<?php if (isset($error)) : ?>
			<p style="color: red; font-style: italic;"> username dan password anda salah</p>
		<?php endif; ?>
		<h1>Halaman Login</h1>
    <form action="" method="post">
    	<ul>
    		<li>
    			<label for="username">username : </label>
    			<input type="text" name="username">
    		</li>
    		<li>
    			<label for="password">password : </label>
    			<input type="password" name="password">
    		</li>
    		<li>
    			<button type="submit" name="login">Login</button>
    		</li>
    	</ul>
    </form>
</body>
</html>

