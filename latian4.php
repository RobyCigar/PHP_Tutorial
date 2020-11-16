<?php
	require 'function.php';
	$mahasiswa = query("select * from mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		
		
		<?php
		
		    foreach($mahasiswa as $row) : 
		
		?>
		
		
		<tr>
			<td><?php echo $row["id"] ?></td>
			<td>
				<a href="">ubah</a> |
				<a href="">hapus</a>
			</td>
			<td><?php echo $row["nim"] ?></td>
			<td><?php echo $row["nama"] ?></td>
			<td><?php echo $row["email"] ?></td>
			<td><?php echo $row["jurusan"] ?></td>
		</tr>
		
		<?php
		
		    endforeach;
		
		?>
	</table>
</body>
</html>

