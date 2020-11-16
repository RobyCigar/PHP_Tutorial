<?php
require 'function.php';

//fetch data from the url

$id = $_GET["id"];

// Script
if(isset($_POST["submit"])) {
	if(ubah($_POST) > 0) {
		echo "<script>
						alert('data succesfully changed');
						document.location.href = 'latian5.php';
					</script>";
	} else {
		echo "Failed to change user";
	}
}

// query data berdasarkan ID

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>
    
    <form action="" method="post">
    	<input type="hidden" name="id" value="<?= $mhs['id']?>">
    	<ul>
    		<li>
    			<label for="nim">NIM : </label>
    			<input type="text" name="nim" required value="<?= $mhs['nim']?>">
    		</li>
    		<li>
    			<label for="nama">Nama : </label>
    			<input type="text" name="nama" required value="<?= $mhs['nama']?>">
    		</li>
    		<li>
    			<label for="email">Email : </label>
    			<input type="text" name="email" required value="<?= $mhs['email']?>">
    		</li>
    		<li>
    			<label for="jurusan">Jurusan : </label>
    			<input type="text" name="jurusan" required value="<?= $mhs['jurusan']?>">
    		</li>
    		<li>
    			<input type="file" name="gambar">
    		</li>
    		<li>
    			<button type="submit" name="submit">Change</button>
    		</li>
    	</ul>
    </form>
</body>
</html>

