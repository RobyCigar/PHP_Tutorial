<?php
	
	$db = mysqli_connect("localhost", "rabih", "rabihutomo12", "phpdasar");
	/* Fetch data
	$result = mysqli_query($db, "select * from mahasiswa");
	if (!$result) {
		echo mysqli_error();
	}
	*/ 
	
	function query($query) {
		global $db;
		$result = mysqli_query($db, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		} 
		
		return $rows;
	}
	
	
	function tambah($data) {
		global $db;
	//fetch data use htmlspecialchar to prevent script
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		
		$query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', 'img.png');";
	//send to db
		mysqli_query($db, $query);
		
		return mysqli_affected_rows($db);
	}
	
	
	function hapus($id) {
		global $db;
		mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
		
		return mysqli_affected_rows($db);
	}
?>































