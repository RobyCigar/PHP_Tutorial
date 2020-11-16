<?php
	$jodoh = [
		[
			"nama" => "rabih",
			"status" => "jomblo",
			"usia" => "19"
		],
		[
			"nama" => "bila",
			"status" => "dah pny pacar",
			"usia" => "17"
		],
		[
			"nama" => "razita",
			"status" => "jomblo, calonnya rabih",
			"usia" => "18"
		]
	];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latian php</title>
</head>
<body>
	
	<?php foreach($jodoh as $j): ?>
	
	<ul> <a href="latian.php?nama=<?= $j["nama"]?>&status=<?= $j["status"]?>" ><?= $j["nama"]; ?> </a> </ul>
	
	<?php endforeach; ?>

</body>
</html>

