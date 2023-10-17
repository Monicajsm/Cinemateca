<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$pagina404 = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `404_page` WHERE `id` = '$pagina404'");

			$sms = 'Página 404 apagada com sucesso!';
			$retorno = '../404.php?sms='.$sms;

		}
	}


	if ($control != true) {
		die("Não tem permissao para ver esta página!");
	}else{
		//echo "Location: ".$retorno;
		header("Location: ".$retorno);
	}

?>