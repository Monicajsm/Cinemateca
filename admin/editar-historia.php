<?php
	if (!isset($_SESSION)) {
	  	session_start();
	}  
	require_once 'functions/dbconfig.php';

	if (isset($_SESSION['login']) && $_SESSION['login'] == $ss) {
		// code...
	}else{
		header("Location: logout.php");
		exit();
	}

	if (isset($_GET['id']) && $_GET['id'] != '') {
		$idHistoria = $_GET['id'];
		$pesquisa = $mysqli->query("SELECT * FROM `historia` WHERE `id` = '$idHistoria'");
		if($pesquisa->num_rows>0){
			$print = $pesquisa->fetch_object();
		}else{
			header("Location: logout.php");
			exit();
		}
	}else{
		header("Location: logout.php");
		exit();
	}

	// Variavel de controlo de erro
	$erro = '';


	// Se Post estiver definido
	if(isSet($_POST['enviar']) && $_POST['enviar']!=''){
		// guardar dados em variaveis
		$ano = $_POST['ano'];
		$evento = $_POST['evento'];
		$idhist = $_POST['idhist'];
		

		// Validacoes dos dados da tabela
		if (!empty($ano) && !empty($evento)) {
		
			// Query de insercao
			$editar = $mysqli->query("UPDATE `historia` SET 
			`ano` = '$ano',
			`evento` = '$evento'
			
			WHERE
			`id` = '$idHistoria'
			");

		
			if ($editar) {
				$erro = '<div class="alert alert-success">Categoria inserido com sucesso!</div>';
				header('Refresh:2; url=historia.php');
			}else{
				$erro = '<div class="alert alert-danger">Houve um erro de conexao a base de dados!</div>';	
			}
					

		}
	}

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Backend - Editar História</title>
	<meta name="keywords" content="Backend Mónica Marques">
	<meta name="description" content="Backend Marques">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<!-- STYLE SHEET -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="js/jquery-3.6.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script src="js/scripts.js"></script>
</head>
<body class="body">	
	<?php include('includes/header.php'); ?>
	
	<section class="cabecalho">
		<h1 class="titulo-crm">EDITAR HISTÓRIA</h1>
		<h6 class="descricao-crm">Aqui editamos a linha cronológica da Cinemateca.</h6>
	</section>
	<section class="dados-lista">
		<?php 

		if ($erro != '') {
			echo $erro;
		}
	
		?>
		<!-- Form de introducao de dados -->
		<form method="POST" action=""  enctype="multipart/form-data">
		<input type="hidden" name="idhist" value="<?php echo $idHistoria; ?>">
	

			<div class="row-no-padding">
				<div class="col-md-6">
					<label>
						ANO<br>
						<input type="text" name="ano" placeholder="ANO" value="<?php echo $print->ano; ?>">
					</label>
				</div>
				<div class="col-md-6">
					<label>
						EVENTO<br>
						<textarea placeholder="EVENTO" name="evento" value="<?php echo $print->evento; ?>"></textarea>
					</label>
				</div>


				<div class="col-md-12 lista-btns">
					<input class="btn" type="submit" name="enviar" value="GUARDAR">
				</div>
			</div>
		</form>
</section>


	<?php include('includes/footer.php'); ?>
</body>

</html>