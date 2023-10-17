<?php 
	$ss = 'site2023';

	// chmodDir
	// Nao usar o 0777 sem ser em localhost, usar sempre 0755
	$chmodDir = 0777;

	// Tamanho máximo das imagens em bytes
	$imgSize=5000000;

	$mysqli_host = 'localhost';
	$mysqli_user = 'root';
	$mysqli_pass = '';
	$mysqli_db = 'cinemateca';
	

	$mysqli = new mysqli($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db);

	if ($mysqli->connect_errno) {
		echo "MySQLi erro ".$mysqli->connect_errno.'<br>';
		echo "Com o erro ".$mysqli->connect_error;
		die("Falha de conexão a base dados");
	}

?>