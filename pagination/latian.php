<?php

session_start();

	if (!isset($_SESSION['login'])) {
		header('Location: login.php');
		exit;
	}
	
	require 'function.php';
	
	//pagination
	$jumlahDataPerHalaman = 5;
	$jumlahData = count(query("SELECT * FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

	var_dump($halamanAktif);
	
	$mahasiswa = query("select * from mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");
	
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
	
	<?php if($halamanAktif > 1) : ?>
		<a href="page=<?= $halamanAktif - 1?>">&laquo;</a>
	<?php endif;?>
	
	<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if($i == $halamanAktif) : ?>
			<a href="?page=<?= $i ?>" style="font-weight: bold; color: red;"><?= $i ?></a>
		<?php else : ?>
			<a href="?page=<?= $i ?>" ><?= $i ?></a>
		<?php endif; ?>
	<?php endfor; ?>
	
	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="page=<?= $halamanAktif + 1?>">&raquo;</a>
	<?php endif;?>
	
	
</body>
</html>














