<?php
	require 'function.php';

   if (isset($_POST['register'])) {
       if (registrasi($_POST) > 0) {
           echo "<script>
           	alert('new user has been created')
           </script>";
       } else {
           echo mysqli_error($db);
       }
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    	label {display: block;}
    </style>
    <title>Registrasi</title>
</head>
<body>
    
    <h1>Halaman Registrasi</h1>
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
    			<label for="password2">konfirmasi password : </label>
    			<input type="password" name="password2">
    		</li>
    		<li>
    			<button type="submit" name="register">register</button>
    		</li>
    	</ul>
    </form>
    
</body>
</html>

