<?php

	require 'function.php';
	
	$id = $_GET['id'];

	if(hapus($id) > 0){
		echo "<script>
						alert('data succesfully deleted');
						document.location.href = 'latian5.php';
					</script>";
	} else {
		echo "<script>
						alert('failed to delete');
						document.location.href = 'latian5.php';
					</script>";
	};

?>
