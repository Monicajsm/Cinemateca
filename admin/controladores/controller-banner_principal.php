<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$bannerID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `banner_principal` WHERE `id` = '$bannerID'");

			$sms = 'Banner apagado com sucesso!';
			$retorno = '../banner_principal.php?sms='.$sms;

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