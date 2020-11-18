<?php
session_start();
require 'function.php';
/*
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	
	//ambil username berdasarkan id
	$result = mysqli_query($db, "SELECT username FROM users WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	
	//cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}
*/


if (isset($_SESSION['login'])) {
	header('Location: index.php');
	exit;
}



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
    			//cek remember me
    			if(isset($_POST['remember'])) {
    				//buat cookie
    				setcookie('id', $row['id'], time() + 30);
    				setcookie('key', hash('sha256', $row['username']));
    			}
    			//redirect
    			header("Location: index.php");
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
    			<input type="text" name="username" required>
    		</li>
    		<li>
    			<label for="password">password : </label>
    			<input type="password" name="password" required>
    		</li>
    		<li>
    			<label for="remember">remember me?</label>
    			<input type="checkbox" name="remember">
    		</li>
    		<li>
    			<button type="submit" name="login">Login</button>
    		</li>
    	</ul>
    </form>
    <a href="login.php">wanna login?</a>
</body>
</html>

