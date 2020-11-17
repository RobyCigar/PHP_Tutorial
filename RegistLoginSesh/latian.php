<?php

session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}
	
	require 'function.php';
	
	$mahasiswa = query("select * from mahasiswa");
	
	//tombol pencarian
	
	if(isset($_POST['cari'])) {
		$mahasiswa = cari($_POST['keyword']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <a href="logout.php">Logout</a>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size=40 placeholder="Search" autocomplete="off" autofocus>
		<button type="submit" name="cari">Search</button>
	</form>
	
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nim</th>
			<th>Profile</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		
		<?php $i = 1; ?>
		<?php foreach($mahasiswa as $row) : ?>
		
		
		<tr>
			<td><?php echo $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row['id']?>">ubah</a> |
				<a href="hapus.php?id=<?= $row['id']?>"  onclick="return confirm('Are you sure to delete the user?')">hapus</a>
			</td>
			<td><?php echo $row["nim"] ?></td>
			<td>
				<img src="./asset/<?= $row["gambar"]?>" alt="<?= $row["gambar"]?>" width="100" height="auto"> 
			</td>
			<td><?php echo $row["nama"] ?></td>
			<td><?php echo $row["email"] ?></td>
			<td><?php echo $row["jurusan"] ?></td>
		</tr>
		<?php $i++; ?>
		
		<?php endforeach; ?>
	</table>
</body>
</html>

