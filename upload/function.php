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
		$gambar = upload();
		if(!$gambar) {
			return false;
		}
		
		$query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES (NULL, '$nama', '$nim', '$email', '$jurusan', '$gambar');";
	//send to db
		mysqli_query($db, $query);
		
		return mysqli_affected_rows($db);
	}
	
	function upload() {
		$namafile = $_FILES['gambar']['name'];
		$ukuranfile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpname = $_FILES['gambar']['tmp_name'];
		
		if($error === 4) {
			echo "<script>
							alert('Pick the Image!!!')
						</script>";
			return false;
		}
		
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if(in_array())
	}
	
	
	function hapus($id) {
		global $db;
		mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
		
		return mysqli_affected_rows($db);
	}
	
	function ubah($data) {
		global $db;
	//fetch data use htmlspecialchar to prevent script

		$id = $data['id'];
		$nama = htmlspecialchars($data["nama"]);
		$nim = htmlspecialchars($data["nim"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		
		$query = "UPDATE `mahasiswa` SET 
		`nama` = '$nama', 
		`nim` = '$nim', 
		`email` = '$email', 
		`jurusan` = '$jurusan' WHERE `mahasiswa`.`id` = $id";
	//send to db
		mysqli_query($db, $query);
		
		return mysqli_affected_rows($db);
	}
	
	
	function cari($keyword) {
		$query = "SELECT * FROM mahasiswa
		WHERE 
		nama LIKE '$keyword%' OR
		nim LIKE '$keyword%' OR
		email LIKE '$keyword%' OR
		jurusan LIKE '$keyword%'
		";
		return query($query);
	}
?>































