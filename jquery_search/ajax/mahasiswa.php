<?php 
	require '../function.php';
	$keyword = $_GET['keyword'];
	$query = "SELECT * FROM mahasiswa WHERE 
						nama LIKE '$keyword%' OR
						nim LIKE '$keyword%' OR
						email LIKE '$keyword%' OR
						jurusan LIKE '$keyword%'
						";
	$mahasiswa = query($query);
 ?>
 
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
