<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$filmeID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `filmes` WHERE `id` = '$filmeID'");

			$sms = 'Filme apagado com sucesso!';
			$retorno = '../filmes.php?sms='.$sms;

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