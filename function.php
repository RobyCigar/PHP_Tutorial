<?php
	// Connect to databases
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
?>
