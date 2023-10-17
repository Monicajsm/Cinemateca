<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$infoID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `info_geral` WHERE `id` = '$infoID'");

			$sms = 'Informação geral apagada com sucesso!';
			$retorno = '../info_geral.php?sms='.$sms;

		}
	}

	if (isset($_GET['accao']) && $_GET['accao'] == 'editar') {
		$control = true;
	}

	if (isset($_GET['accao']) && $_GET['accao'] == 'inserir') {
		$control = true;
	}

	if ($control != true) {
		die("Não tem permissao para ver esta página!");
	}else{
		//echo "Location: ".$retorno;
		header("Location: ".$retorno);
	}

?>