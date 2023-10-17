<?php  
	require_once '../functions/dbconfig.php';
	$control = false;
	$retorno = '';
	$sms = '';

	if (isset($_GET['accao']) && $_GET['accao'] == 'apagar') {
		$control = true;
		if (isset($_GET['id'])) {
			$userID = $_GET['id'];
			$apagar = $mysqli->query("DELETE FROM `menus` WHERE `id` = '$userID'");

			$sms = 'Menu apagado com sucesso!';
			$retorno = '../menus.php?sms='.$sms;

		}
	}


	if ($control != true) {
		die("Não tem permissao para ver esta página!");
	}else{
		//echo "Location: ".$retorno;
		header("Location: ".$retorno);
	}

?>