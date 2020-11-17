<?php
	
	$db = mysqli_connect("localhost", "rabih", "rabihutomo12", "phpdasar");
	
	function query($query) {
		global $db;
		$result = mysqli_query($db, $query);
		$rows = [];
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		} 
		
		return $rows;
	}
	
	// UBAH FUNCTION
	
	
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
	
	
	// UPLOAD FUNCTION
	
	
	function upload() {
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpname = $_FILES['gambar']['tmp_name'];
		
		if($error === 4) {
			echo "<script>
					alert('You should pick an image!!!')
				</script>";
			return false;
		}
		
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		
		//cek ekstensi file

		if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "<script>
					alert('wrong image extension dude!')
				</script>";
			return false;
		}
		
		// cek ukuran file
		if($ukuranFile > 1000000) {
			echo "<script>
					alert('Too big dude!')
				</script>";
			return false;
		}

		// generate nama file
		$namaFileBaru = uniqid();
		$namaFileBaru .=  '.';
		$namaFileBaru .= $ekstensiGambar;
		
		var_dump($namaFileBaru);

		move_uploaded_file($tmpname, 'asset/' . $namaFileBaru);
		return $namaFileBaru;
	}
	
	//HAPUS FUNCTION
	
	
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
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		//cek apakah user pilih gambar baru atau tidak?

		if($_FILES['gambar']['error'] === 4){
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}
		
		$query = "UPDATE `mahasiswa` SET 
		`nama` = '$nama', 
		`nim` = '$nim', 
		`email` = '$email', 
		`jurusan` = '$jurusan',
		`gambar` = '$gambar' WHERE `mahasiswa`.`id` = $id";
	//send to db
		mysqli_query($db, $query);
		
		return mysqli_affected_rows($db);
	}
	
	
	//CARI FUNCTION
	
	
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
	
	
	//REGISTER FUNCTION
	
	function registrasi($data) {
		global $db;
		
		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($db, $data["password"]);
		$password2 = mysqli_real_escape_string($db, $data["password2"]);
		
		// Cek username sudah ada atau belum
		$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
		
		if(mysqli_fetch_assoc($result)) {
		    echo "<script>
		    				alert('username sudah ada, mohon masukkan usename yang lain 😪️')	
		    		</script>";
		    return false;
		}
		
		if ($password !== $password2) {
		    echo "<script>
		    				alert('konfirmasi password tidak sesuai')	
		    		</script>";
		    return false;
		}
		//ENCRYPT
		$password = password_hash($password, PASSWORD_DEFAULT);
		
		mysqli_query($db, "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$username', '$password')");
		return mysqli_affected_rows($db);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>
