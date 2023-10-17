<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$salaID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `salas` WHERE `id` = '$salaID'");

			$sms = 'Sala apagada com sucesso!';
			$retorno = '../salas.php?sms='.$sms;

		}
	}


	if ($control != true) {
		die("Não tem permissao para ver esta página!");
	}else{
		//echo "Location: ".$retorno;
		header("Location: ".$retorno);
	}

?>