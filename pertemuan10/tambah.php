<?php
require 'function.php';


if(isset($_POST["submit"])) {
	if(tambah($_POST) > 0) {
		echo "<script>
						alert('data succesfully added');
						document.location.href = 'latian5.php';
					</script>";
	} else {
		echo "Failed to add user";
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>
    
    <form action="" method="post">
    	<ul>
    		<li>
    			<label for="nrp">NIM : </label>
    			<input type="text" name="nrp" required>
    		</li>
    		<li>
    			<label for="nama">Nama : </label>
    			<input type="text" name="nama" required>
    		</li>
    		<li>
    			<label for="email">Email : </label>
    			<input type="text" name="email" required>
    		</li>
    		<li>
    			<label for="jurusan">Jurusan : </label>
    			<input type="text" name="jurusan" required>
    		</li>
    		<li>
    			<button type="submit" name="submit">Add</button>
    		</li>
    	</ul>
    </form>
</body>
</html>

