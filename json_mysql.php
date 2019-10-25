<?php 

	$connect = mysqli_connect("localhost", "root", "", "vuelos");

	$filename = "vuelos18oct.json";  //Aqui se cambia el nombre del archivo json a almacenar en la BD

	$data = file_get_contents($filename);

	$array = json_decode($data, true);
	
	foreach($array as $row) {

		$origen = $row["ORIGEN"];
		$destino = $row["DESTINO"];
		$linea = $row["LINEAAEREA"];
		$tarifa = $row["TARIFAFINALHOY"];
		$usd = $row["USD"];
		$financiacion = $row["FINANCIACION"];
		$tiempo = $row["TIEMPO"];
		$tdc = $row["TDC"];
		$legales = $row["LEGALES"];
		$obser = $row["OBSERVACIONES"];
		$vto = $row["VTO"];
		$link = $row["LINK"];

		$sql = "INSERT INTO vuelos_aereos(ORIGEN,DESTINO,LINEAAEREA,TARIFAFINALHOY,USD,FINANCIACION,TIEMPO,TDC,LEGALES,OBSERVACIONES,VTO,LINK) VALUES ('".$origen."','".$destino."','".$linea."','".$tarifa."','".$usd."','".$financiacion."','".$tiempo."','".$tdc."','".$legales."','".$obser."','".$vto."','".$link."')";		

		mysqli_query($connect, $sql);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>JSON to MySQL</title>
</head>
<body>
	<h1> <?php echo "JSON Stored in DB Successfully!"?> </h1>
	<a href="index.html">Do you want transform another xlsx?</a>
	
</body>
</html>