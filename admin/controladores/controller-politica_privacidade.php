<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$infoID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `politicadeprivacidade` WHERE `id` = '$infoID'");

			$sms = 'Informação apagada com sucesso!';
			$retorno = '../politicadeprivacidade.php?sms='.$sms;

		}
	}


	if ($control != true) {
		die("Não tem permissao para ver esta página!");
	}else{
		//echo "Location: ".$retorno;
		header("Location: ".$retorno);
	}

?>